<?php
session_start();
$bdm = $_SESSION['bdm'];
require_once("./includes/initialize.php");
 $docname=$segment= $specialty='';
  $docnameErr=$segmentErr=$specialtyErr='';

if (isset($_POST['sub'])) {
    $error = array();
    $docname = $_POST['docname'];
    $segment = $_POST['segment'];
    $specialty = $_POST['specialty'];
    if (empty($_POST['docname'])) {
       $docnameErr = 'required';
    } elseif (empty($_POST['segment'])) {
         $segmentErr = 'required';
    } elseif (empty($_POST['specialty'])) {
         $specialtytErr = 'required';
    } else {
        $field_array = array('doc_name' => $_POST['docname'], 'segment' => $_POST['segment'], 'speciality' => $_POST['specialty'], 'bdm_id' => $bdm, 'created_at' => date('y-m-d'));
        $add = new doctor();
        $add->create($field_array);
        flashMessage('Added Successfully', 'success');
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
<div class="container-fluid" >
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>  Enter Doctor Details </b>
                </div>
                <form method="post"  action="#" >
                    <div class="panel-body"> 
                        <div class="form-group">

                            <input type="text" name="docname" class="form-control" placeholder="Name Of Doctor" required="">
                            <?php
                            echo   $docnameErr;
                     
                            ?>
                        </div>
                        <div class="form-group">
                            <select name="segment" class="form-control" required="">
                                <option> Select Segment</option>
                                <option>A</option>
                                <option>B+</option>
                                <option>B</option>
                                <option>C</option>
                            </select> 
                              <?php
                            echo $segmentErr;
                      
                            ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="specialty" placeholder="Specialty " required="">
                            <?php
                            echo $specialtyErr;
                      
                            ?>
                        </div>
<input type="submit" name="sub" class="pull-right btn btn-primary" value="Add">
                    </div>
               
                    
                 
                </form>
            </div>

        </div>
    </div>
</div>