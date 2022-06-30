<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Grid</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_risk_processus/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!--input type="hidden" name="ID_sector" value="<?php echo $ID_sector ?>"-->

                                                <?php if (isset($ID_risk_processus)) {
                                                ?>
                                                    <input type="hidden" name="ID_risk_processus" value="<?php echo $ID_risk_processus ?>">
                                                <?php } ?>

                                                <input type="hidden" name="ID_risk" value="<?php echo $ID_risk ?>">
                                                <input type="hidden" name="ID_identification" value="<?php echo $ID_identification ?>">


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Date Cible</label>
                                                    <div class="col-md-9">

                                                        <input type="date" name="Date_cible_risk_processus" value="<?php if (isset($Date_cible_risk_processus)) {
                                                                                                                        echo $Date_cible_risk_processus;
                                                                                                                    } ?>" placeholder="Date Cible" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Date Réelle</label>
                                                    <div class="col-md-9">

                                                        <input type="date" name="Date_reel_risk_processus" value="<?php if (isset($Date_reel_risk_processus)) {
                                                                                                                        echo $Date_reel_risk_processus;
                                                                                                                    } ?>" placeholder="Date Réelle" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-4">processus </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="ID_processus" id="ID_processus">
                                                            <?php
                                                            foreach ($processus as $row) {

                                                                if (isset($ID_processus)) {

                                                                    if ($row['ID_processus'] == $ID_processus) {

                                                            ?>

                                                                        <option value=<?= $row['ID_processus'] ?> selected><?= $row['Title_processus'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_processus'] ?>><?= $row['Title_processus'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_processus'] ?>><?= $row['Title_processus'] ?></option>


                                                            <?php }
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="text-right">
                                            <button id="btn_add" type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>

                                    </div>

</div>
</div>
</div>

</div>

</section>
<!-- //forms -->
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<script>
var update_parent = function() {
if ($("#parent").is(":checked")) {
$('#ID_chapter').prop('disabled', false);
$('#Name_chapter').prop('disabled', false);

} else {
$('#ID_chapter').prop('disabled', 'disabled');
$('#Name_chapter').prop('disabled', 'disabled');

}
if ($("#main").is(":checked")) {
$('#ID_chapter').prop('disabled', true);
$('#Name_chapter').prop('disabled', true);

} else {
$('#ID_chapter').prop('disabled', false);
$('#Name_chapter').prop('disabled', false);

}
};
$(update_parent);
$("#parent").change(update_parent);
$("#main").change(update_parent);
</script>
<script>
$(document).ready(function() {




$("#btn_add").click(function() {
swal({
title: 'Save',
text: "Are you sure?",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
cancelButtonText: 'Cancel',

confirmButtonText: 'Yes'
}).then((result) => {

if (result.value) {
//$("#action").val(1);


$('form#popup').submit();
//	swal('its OK '+result.value);
} else {
swal("This operation is canceled");
return false;
}
});
});

});
</script>