<?php
require_once("./includes/initialize.php");
session_start();
$tf_id = $_SESSION['taskforce'];
$doctor = doctor::find_by_tf($tf_id);

//$doctors=  doctor:: find_by_date($bdm);

$total = pob::total_tf($tf_id);
$last = pob::last_tf($tf_id);
require_once './header.php';
?>

<?php
if (!empty($total)) {
    foreach ($total as $totals) {
        ?> 
        <div><b> Total Value POB</b>
            <?php echo $totals->sum; ?>
            <?php }
    }
    ?>
</div>
<div><b> Last  Entered  POB Value</b>

<?php echo $last->pob; ?>

</div>
<div class="container-fluid" >
    <div class="row">
        <table class="table table-bordered">

            <tr>
                <th> Dr.<br> Name</th>
                <th class="hidden-xs"> Specialty</th>
                <th>Class</th>
                <th>Rx<br> Count</th>
                <th>Date</th>


            </tr>
            <?php
            if (!empty($doctor)) {
                foreach ($doctor as $doctors) {
                    ?>

                    <tr>
                        <td> <?php echo $doctors->doc_name ?></td>
                        <td class="hidden-xs"> <?php echo $doctors->speciality ?></td>
                        <td> <?php echo $doctors->segment ?></td>
                        <td> <?php echo $doctors->rx ?></td>
                        <td><?php echo date('dM', strtotime($doctors->created_at)); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>

    </div>
</div>

<?php require_once './footer.php'; ?>


