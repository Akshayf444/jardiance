<?php
require_once("./includes/initialize.php");
if (isset($_POST['submit'])) {
    $bdm = bdm::find();
    $date = date('y-m-d', strtotime($_POST['date1']));
    $date1 = date('y-m-d', strtotime($_POST['date2']));
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    date_default_timezone_set('Europe/London');

    if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');

    /** Include PHPExcel */
// Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

// Set document properties
    $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");
    $i = 2;

    $col_index = array('E','F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R','S','T','U','V','W','X','Y','Z');
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1' , 'BDM NAME')
                    ->setCellValue('B1' , 'ZONE')
                    ->setCellValue('C1' , 'ASM NAME')
                
                    ->setCellValue('D1' , 'ZSM NAME');
    if (!empty($bdm)) {
        foreach ($bdm as $bdms) {

            $total = ho::list_rx($date, $date1, $bdms->bdm_id);
        
            
         

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $bdms->bdm_name)
                    ->setCellValue('B' . $i, $bdms->zone)
                    ->setCellValue('C' . $i, $bdms->asm_name)
                    ->setCellValue('D' . $i, $bdms->zsm_name);
            $j = 0;
            foreach ($total as $value) {
                $objPHPExcel->setActiveSheetIndex(0)
                             ->setCellValue($col_index[$j].'1' , $value->mydate)
                        ->setCellValue($col_index[$j] . $i, $value->rx_count);
                $j++;
            }


            $i++;
        }
    }
// Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a clientâ€™s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="MasterReport.xlsx"');
    $objWriter->save('php://output');
    exit;
}
?>
<?php
require_once './header.php';
?>





<div class="col-lg-12">
    <form action="" method="post">
        <div class="form-group">
        <b> From</b>  <input type="text" name="date1" class="form-control" id="date">
        </div>
        <div class="form-group">
        <b> To</b> <input type="text" name="date2"  class="form-control" id="date1"> &nbsp;
        </div>
        <input  type="submit" name="submit"  class="btn btn-primary">
    </form>
</div>
<?php require_once './footer.php'; ?>

<script>
    $(function () {
        $("#date").datepicker();
        $("#date1").datepicker();
    });
</script>
