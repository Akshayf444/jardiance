<?php
require_once("./includes/initialize.php");
session_start();
$tf_id = $_SESSION['taskforce'];
$emp= $_SESSION['tfemp'];
$bdm_id = $_GET['bdm'];
$doctor = doctor::list_doctor($bdm_id);

if (isset($_POST['sub'])) {
    for ($i = 0; $i < count($_POST['docid']); $i++) {
        $exitrecord = tf_doc::find_by_id($_POST['docid'][$i], $tf_id);
        if (empty($exitrecord)) {
            $field_array = array('doc_id' => $_POST['docid'][$i], 'tf_id' => $tf_id, 'created_at' => date('Y:m:d H:i:s'),'emp_id'=>$emp);
            $tf_doc = new tf_doc();
            $tf_doc->create($field_array);
            flashMessage('Added Successfully', 'success');
        }
    }
}

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
<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<div class="container-fluid" >
    <div class="row">

        <form method="post" action="#">
            <tr> 
                <?php
                if (!empty($doctor)) {
                    foreach ($doctor as $doctors) {

                        $exit = tf_doc::find_by_id($doctors->doc_id, $tf_id);
                       
                        ?>


                    <!--<a href="tf_addrx.php?docid=<?php echo $doctors->doc_id ?>">-->
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
                                                <div class="col-xs-4 pull-right" >
                                                    <input type="checkbox" name="docid[]" <?php
                                                    if (isset($exit->doc_id)) {
                                                        echo "checked";
                                                    }
                                                    ?> value="<?php echo $doctors->doc_id;
                                                    ?>"></td>
                                                    <input type="hidden" name="bdm" value=<?php  echo $bdm_id ?> >

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            ?>

    </div>

</div>
<div class="col-lg-6">
<input type="submit" class=" btn btn-primary pull-right" name="sub" value="Add">
</div>
</form>

</div>
</div>

<?php
require_once './footer.php';
?>
 

