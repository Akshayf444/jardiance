<?php
require_once("./includes/initialize.php");
if (isset($_POST["zone"])) {
    $hq = bdm::hq($_POST["zone"]);
    
    ?>
<option>Select  Territory</option>
    <?php
    if (!empty($hq)) {
        foreach ($hq as $value){
            
            ?>

        <option value ="<?php echo $value->HQ; ?>"><?php echo $value->HQ; ?></option>';
        <?php
    }
    }
}
?>
        <?php
    if (isset($_POST["terri"])) {
    $bdm = bdm::list_bdm($_POST["terri"]);
   
    ?>
        <option>Select Bdm</option>
    <?php
    if (!empty($bdm)) {
        foreach ($bdm as $BDM){
            
            ?>

        <option value ="<?php echo $BDM->bdm_id; ?>"><?php echo $BDM->bdm_name; ?></option>';
        <?php
    }
    }
}
        
?>
