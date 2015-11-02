<?php

class bdm extends Table {

    protected $table_name = "bdm";

    public static function authenticate($id = "", $password = "") {
        global $database;
        $id = $database->escape_value($id);
        $password = $database->escape_value($password);
        if ($id != '' && $password != '') {
            $sql = "SELECT * FROM bdm ";
            $sql .= "WHERE bdm_empid = '{$id}' ";
            $sql .= " AND  password = '{$password}' ";
               $sql .= " AND  status='Active'  ";
         
            $sql .= " LIMIT 1";
            //echo $sql;
            $result_array = Query::executeQuery($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    }
     
    public static function find() {
        $sql= "select bdm.*,asm.*,zsm.* from bdm left join asm on bdm.asm_id=asm.asm_id left join zsm on asm.zsm_id=zsm.zsm_id where bdm.status='Active'  ";
        return Query:: executeQuery($sql);
    }
       
    public static function top_bdm() {
       $date=  date('Y-m-d');
        $sql=  " SELECT bdm.bdm_name, bdm.HQ ,SUM(rx_save.rx) AS SUM FROM bdm 
 LEFT JOIN rx_save ON bdm.bdm_id=rx_save.bdm_id 
WHERE rx_save.created_at='$date' and bdm.status='Active' 
GROUP BY bdm.bdm_id ORDER BY SUM DESC LIMIT 5";
        return Query:: executeQuery($sql);
    }
  public static function top_asm() {
       $date=  date('Y-m-d');
        $sql=  "SELECT SUM( CASE WHEN rx_save.`created_at`='$date' THEN `rx_save`.`rx` ELSE 0   END ) AS currentsum,  SUM(rx_save.`rx`) AS totalsum ,asm.`asm_name`,asm.`HQ` FROM asm
LEFT JOIN  bdm ON asm.asm_id=bdm.asm_id
 LEFT JOIN rx_save ON bdm.bdm_id=rx_save.bdm_id 
 where bdm.status='Active' 
GROUP BY asm.asm_id ORDER BY currentsum DESC LIMIT 5";
        return Query:: executeQuery($sql);
    }
    public static function top_zsm() {
       $date=  date('Y-m-d');
        $sql=  "SELECT SUM(rx_save.rx) AS SUM,zsm.`zsm_name`,zsm.`HQ` FROM zsm
LEFT JOIN  asm ON asm.zsm_id=zsm.zsm_id
LEFT JOIN  bdm ON asm.asm_id=bdm.asm_id
 LEFT JOIN rx_save ON bdm.bdm_id=rx_save.bdm_id 
WHERE rx_save.created_at='$date' and bdm.status='Active' 
GROUP BY zsm.zsm_id ORDER BY SUM DESC LIMIT 1";
         $result_array = Query::executeQuery($sql);
                   return !empty($result_array) ? array_shift($result_array) : false;

    }
     public static function zone() {
        $sql= " SELECT DISTINCT(zone) FROM  bdm ";
           return Query::executeQuery($sql);
    }
       
     public static function hq($HQ) {
        $sql= "SELECT  DISTINCT(hq) as HQ FROM  bdm  WHERE zone='$HQ' and bdm.status='Active'  ";
           return Query::executeQuery($sql);
    }
      public static function  list_bdm ($hq) {
        $sql= "    SELECT bdm_name, bdm_id FROM bdm WHERE HQ='$hq' and bdm.status='Active' ";
       
           return Query::executeQuery($sql);
    }
   
}
