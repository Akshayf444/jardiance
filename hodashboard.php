<?php 
$filename = basename(__FILE__);
require_once './header.php'; ?>
        <style>
    .btn-block{
        background:url('images/Jardiance _Button.png') center;
         color: #000;
    }
    </style>
<div class="container-fluid" >
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

<?php require_once './footer.php'; ?>
