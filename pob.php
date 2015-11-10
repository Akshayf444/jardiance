<?php
require_once(dirname(__FILE__) . "/includes/initialize.php");
session_start();

$id = $_SESSION['bdm'];

$pobErr = $stripsErr = $chemistErr = "";
$pob = $strips = $chemist =$msg=$msg2= "";
//$total_till=  pob::total_till_date($id);
if (isset($_POST['save'])) {

    $error = array();
    $pob = $_POST['pob'];
    $strips = $_POST['strips'];
    $chemist = $_POST['chemist'];
    if (empty($_POST['pob'])) {
        $pobErr = 'required';
    } elseif (empty($_POST['strips'])) {
        $stripsErr = 'required';
    } elseif (empty($_POST['chemist'])) {
        $chemistErr = 'required';
    } else if(!is_numeric($_POST['pob'])) {
        $msg = '<span class="error"> Data entered was not numeric</span>';
    }
     else if(!is_numeric($_POST['strips'])) {
        $msg2 = '<span class="error"> Data entered was not numeric</span>';
    }
    else {
        $field_array = array('pob' => $_POST['pob'], 'strips' => $_POST['strips'],'type'=>'bdm', 'chemist' => $_POST['chemist'], 'bdm_id' => $id, 'created_at' => date('Y:m:d '));
        $rx = new pob();
        $rx->create($field_array);
       
        flashMessage('Added Successfully', 'success');;
    }
}?>

<?php
require_once 'header.php';
?>
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>


<div class="container-fluid" >
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <b> Value Of  POB Generated </b>
                </div>
                <form method="post"  action="#" >
                    <div class="panel-body"> 
                        <div class="form-group">



                            <input type="number" name="pob" class="form-control" placeholder="Value Of POB " required="">
                            <?php echo $pobErr;
                            echo $msg;
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="chemist" class="form-control" placeholder="No.Of Chemist Booked" required="">
                            <?php echo $chemistErr; ?>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" name="strips" placeholder="No.Of Strips Booked" required="">
                            <?php echo $stripsErr; 
                            echo $msg2;
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary "  name="save" value="Submit" placeholder="No of Rx" >
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>