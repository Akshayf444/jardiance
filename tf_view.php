<?php
require_once("./includes/initialize.php");
session_start();
$tf_id = $_SESSION['taskforce']; 
$doctor= tf_doc::list_doctor($tf_id);
require_once './header.php';
?>
<style>
    .bgc-fff {
        background-color: #9DC7E0!important;
    }
    .box-shad {
        -webkit-box-shadow: 1px 1px 0 rgba(0,0,0,.2);
        box-shadow: 1px 1px 0 rgba(0,0,0,.2);
    }
    .brdr {
        border: 1px solid #ededed;
    }

    /* Font changes */
    .fnt-smaller {
        font-size: 1em;
        padding-top: 5px;
    }
    .fnt-lighter {
        color: #499E37;
    }

    /* Padding - Margins */
    .pad-10 {
        padding: 5px!important;
    }
    .mrg-0 {
        margin: 0!important;
    }
    .btm-mrg-10 {
        margin-bottom: 10px!important;
    }
    .btm-mrg-20 {
        margin-bottom: 20px!important;
    }

    /* Color  */
    .clr-535353 {
        color: #535353;
    }
</style>

<div class="container-fluid" >
    <div class="row">
        <?php
        if (!empty($doctor)) {
            foreach ($doctor as $doctors) {
                ?>

        <a href="tf_addrx.php?docid=<?php echo $doctors->doc_id    ?>">
                <div class="col-xs-6" style="padding-right: 0px"> 
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-10 property-listing">
                        <div class="media">
                            <div class="row">
                                <div class="col-lg-12" style="padding-right: 5px ">
                                    <b>
                                        <?php echo $doctors->doc_name; ?>
                                        <small> </small>
                                    </b>
                                    <div class="row row-margin-top" >

                                        <div class="col-lg-12" >
                                            <b>Specialty : </b><?php echo $doctors->speciality; ?>

                                        </div>
                                        <div class="col-lg-12" >
                                            <b>Class : </b><?php echo $doctors->segment; ?>

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </a>
            <?php }
        } ?>
      
    </div>

</div>

<?php require_once './footer.php'; ?>