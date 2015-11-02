<?php 

require_once("./includes/initialize.php");
  session_start();
$bdm = $_SESSION['bdm'];
$doctor= doctor::find_by_rx($bdm);
//$doctors=  doctor:: find_by_date($bdm);

$total =  pob::total($bdm);
$last=pob::last($bdm);
require_once './header.php'; 
?>

<?php
if (!empty( $total)) {
    foreach ( $total as  $totals) {
        ?>
<div class="row">
<div class="col-lg-10 "><b> Total Value POB</b>
<?php echo $totals->sum;?>
<?php
}}?>
    </div>
</div>
<div class="row">
<div class= "col-lg-12 "><b> Last  Entered  POB Value</b>

<?php if (!empty( $last)) {echo $last->pob;}?>

</div>
</div>
<div class="container-fluid" >
    <div class="row">
      
        <table class="table table-bordered">
            
            <tr>
                <th> Dr. Name</th>
                <th class="hidden-xs"> Specialty</th>
                <th>Segment</th>
                <th>Rx Count</th>
                   <th>Date</th>
                
                
            </tr>
            <?php
            if (!empty($doctor)) {
    foreach ($doctor as $doctors) {

         ?>
           
            <tr>
                <td> <?php echo  $doctors->doc_name?></td>
                <td class="hidden-xs"> <?php echo  $doctors->speciality?></td>
                <td> <?php echo  $doctors->segment?></td>
                <td> <?php echo  $doctors->rx?></td>
                <td><?php echo date('dM', strtotime($doctors->created_at));?></td>
            </tr>
  <?php
    }
         
            }
            ?>
        </table>
        </div>
    </div>


<?php require_once './footer.php'; ?>
