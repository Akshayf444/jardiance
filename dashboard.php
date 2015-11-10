<?php
session_start();

$filename = basename(__FILE__);
require_once './header.php';
?>
<style>
    .btn-block{
        background:url('images/Jardiance _Button.png') no-repeat center;
        color: #000;
        background-size: 100%;
    }
</style>


<?php if (isset($_SESSION['bdm']) && $_SESSION['bdm'] > 0) { ?>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="Doctors.php" class="btn btn-success btn-lg btn-block">Enter Doctor Details</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="pob.php" class="btn btn-warning btn-lg btn-block">Enter POB Details</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="viewReport.php" class="btn btn-success btn-lg btn-block">View Status</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="TV/index.php" class="btn btn-warning btn-lg btn-block">Live Display</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="enter_doctor.php" class="btn btn-warning btn-lg btn-block">Add Doctor</a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php if (isset($_SESSION['ho']) && !empty($_SESSION['ho'])) { ?><div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="hoview.php" class="btn btn-success btn-lg btn-block">View Report</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">

                    <a href="TV/index.php" class="btn btn-warning btn-lg btn-block">Live Display</a>
                </div>
            </div>
        </div>
    </div>

    <?php }
?>
<?php
if (isset($_SESSION['taskforce']) && $_SESSION['taskforce'] > 0) {
    ?>
    <div class="container-fluid" >

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="tf_view.php" class="btn btn-success btn-lg btn-block">Enter Doctor Details</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="tf_pob.php" class="btn btn-warning btn-lg btn-block">Enter POB Details</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="tf_report.php" class="btn btn-success btn-lg btn-block">View Status</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="TV/index.php" class="btn btn-warning btn-lg btn-block">Live Display</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <a href="add_doc.php" class="btn btn-success btn-lg btn-block"> Add Doctor</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
 <div class="col-lg-10">
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
  Help
</button>
      </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
        <h4 class="modal-title" id="myModalLabel">Help</h4>
      </div>
      <div class="modal-body">
          
          <p  style="text-align: center";> For Any Query Regarding The Reporting,Please Contact<b> 022-65657701</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
<?php require_once './footer.php'; ?>
