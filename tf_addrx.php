<?php
require_once("./includes/initialize.php");
session_start();
$tf_id = $_SESSION['taskforce'];
$zone = $_SESSION['tfzone'];
$emp=$_SESSION['tfemp'];
$id = $_GET['docid'];
if (isset($_GET['docid'])) {
    $id = $_GET['docid'];
}  else {
    redirect_to('Doctors.php');
}
$type = 'tf';
$doctor = doctor::find_by_doc_id($id);
$exit = rx::exit_record($id, $tf_id, $type);
if (!empty($exit)) {
    flashMessage('Already Submitted Rx For This Doctor ', 'error');
}
$rxErr = $stripsErr = $chemistErr = "";
$rx = $strips = $chemist = $msg = $msg2 = "";


if (isset($_POST['save'])) {
    $error = array();
    $rx = $_POST['rx'];
    $strips = $_POST['strips'];
    $chemist = $_POST['chemist'];
    if (empty($_POST['rx'])) {
        $rxErr = 'required';
    } elseif (empty($_POST['strips'])) {
        $stripsErr = 'required';
    } elseif (empty($_POST['chemist'])) {
        $chemistErr = 'required';
    } else if (!is_numeric($_POST['rx'])) {
        $msg = '<span class="error"> Data entered was not numeric</span>';
    } else if (!is_numeric($_POST['strips'])) {
        $msg2 = '<span class="error"> Data entered was not numeric</span>';
    } else {
          if (isset($tf_id) && $tf_id> 0) {
       
        $field_array = array('rx' => $_POST['rx'], 'bdm_id' => $tf_id,'emp_id'=>$emp, 'type' => 'tf',  'zone' => $zone, 'strips' => $_POST['strips'], 'cheimst' => $_POST['chemist'], 'doc_id' => $id, 'created_at' => date('Y:m:d '));
        $rx = new rx();
        $rx->create($field_array);
        flashMessage('Added Successfully', 'success');
                 redirect_to('tf_addrx.php?docid='. $id);
        ;
    }
}
}


require_once './header.php';
?>
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<?php
if (!empty($doctor)) {
    foreach ($doctor as $doctors) {
        ?> 
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b> <?php echo $doctors->doc_name; ?></b>
                        </div>
                        <form method="post"  action="#" >
                            <div class="panel-body"> 
                                <div class="form-group">

                                    <input type="number" name="rx" class="form-control" placeholder="No of Rx" required="">
        <?php
        echo $rxErr;
        echo $msg;
        ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="chemist" class="form-control" placeholder=" Traced At Chemist" required="">
                                    <?php echo $chemistErr;
                                    echo $msg2;
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" name="strips" placeholder=" Strips Sold At Above Chemist" required="">
                                    <?php
                                    echo $stripsErr;
                                    echo $msg2;
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (!empty($exit)) {
                                        flashMessage('Already Submitted For The Day ', 'error');
                                        ?>
        <?php } else {
            ?>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary "  name="save" value="Submit" placeholder="No of Rx">
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <?php
    }
}
?>
<?php require_once './footer.php'; ?>

