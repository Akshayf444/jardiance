<?php
require_once("./includes/initialize.php");
session_start();
$zone = bdm::zone();
require_once './header.php';
?>


<div class="col-lg-10">
    <div class="form-group">
        <select id="zone" name="zone" class="form-control">
<option>Select Zone</option>

            <?php
            if (!empty($zone)) {
                foreach ($zone as $zones) {
                    ?>
                    <option><?php echo $zones->zone; ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
</div>


<div class="col-lg-10">
    <div class="form-group">
        <select class="form-control" id="terri" class="terri">
            <option>Select Territory</option>

        </select>
    </div>
</div>
<form method="get" action="doctor_list.php">
    <div class="col-lg-10">
        <div class="form-group">
            <select class="form-control" id="bdm" name="bdm">
            <option>Select Bdm</option>

            </select>
        </div>
    </div>

    <div class="col-lg-10">
        <input type="submit" class=" btn btn-primary pull-right" name="SUB" value="Enter">
    </div>
</form>
<?php require_once './footer.php'; ?>


<script type="text/javascript">
    $('#zone').change(function () {
        var zone = $(this).val();
        $.ajax({
            url: 'action.php',
            data: {zone: zone},
            type: 'POST',
            success: function (data) {
                $('#terri').html(data);    //please note this, here we're focusing in that input field
            }
        });
    });

    $('#terri').change(function () {
        var terri = $(this).val();
        $.ajax({
            url: 'action.php',
            data: {terri: terri},
            type: 'POST',
            success: function (data) {
                $('#bdm').html(data);    //please note this, here we're focusing in that input field
            }
        });
    });
</script>
