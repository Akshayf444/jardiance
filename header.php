<?php //require_once("./includes/initialize.php");
/*
if(!isset($_SESSION['bdm'])){
    redirect_to('index.php');
}elseif(!isset($_SESSION['ho'])){
    redirect_to('index.php');
}elseif(!isset($_SESSION['taskforce'])){
    redirect_to('index.php');
}*/
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Title</title>

        <!-- Bootstrap Core CSS -->
        <link href="font-awesome-4.1.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/jquery-ui.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-sm-3 col-xs-3 col-md-3">
                        <?php
                        if (isset($filename)) { ?>
                        <a style="padding-left: 0px;padding-top: 0px;"><button onclick="" class="btn btn-link "> <i class="fa  btn-lg pull-left"></i></button> </a>
                        <?php } else {
                            ?>
                        <a style="padding-left: 0px;padding-top: 0px;" onclick="goBack()" class="btn btn-link "><i class="fa fa-arrow-left btn-lg pull-left"></i></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-6 col-xs-6 col-md-6" style="text-align: center" >
                        <a class="" href="dashboard.php" id="homeLogo"><img  style="height: 50px" src="images/logox.png" alt=""/></a>
                    </div>
                    <div class="col-sm-3 col-xs-3 col-md-3">
                        <a href="logout.php"><i class="fa fa-power-off pull-right btn-lg"></i></a>
                    </div>
                    <script>
                        function goBack() {

                            window.history.back();
                        }
                    </script>
                    <!--                     Brand and toggle get grouped for better mobile display 
                                        <div class="navbar-header">
                    
                    
                    
                    
                    
                                            <style>
                                                #homeLogo{
                                                    margin-left: 60px;
                                                }
                                                .btn-success {
                                                    margin-top: 15px;
                                                }
                                            </style>
                                            </a>
                    
                                        </div>
                    
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li>
                                                    <a href="#"></a>
                                                </li>
                                                <li>
                                                    <a href="#"></a>
                                                </li>
                                                <li>
                    
                                                </li>
                                                <li>
                                                    <a href="#"></a>
                                                </li>
                                            </ul>
                                        </div>-->

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="container-fluid row" style="margin-top: 60px">
            <h4 class="col-lg-12"><?php
                if (isset($_SESSION['bdm'])) {
                    $name = $_SESSION['bdmname'];
                    echo 'Welcome,<br>';
                    echo $name;
                }
                 if (isset($_SESSION['taskforce'])) {
                    $tfname = $_SESSION['tfname'];
                    echo 'Welcome,<br>';
                    echo $tfname;
                }
                ?></h4>
        </div>