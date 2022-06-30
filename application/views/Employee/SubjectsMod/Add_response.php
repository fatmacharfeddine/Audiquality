<style>
    .cal-icon:after {
        background: none;
    }
</style>

<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">constat</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">

                        <div class="row">
                            <div class="widget author-widget clearfix col-md-12">
                                <div class="about-author">
                                    <div class="about-author-img">
                                        <div class="author-img-wrap">
                                            <img class="img-fluid rounded-circle" alt="" src="<?php echo base_url() . "/includes/ext/"; ?>assets/template/img/question.jpg">
                                        </div>
                                    </div>
                                    <div class="author-details">
                                        <span class="blog-author-name">Question : </span>
                                        <p><?php echo $Text_question; ?></p>
                                    </div>
                                </div>
                                </br>
                                <form id="popup" action="<?php echo base_url(); ?>Employee_Account/Submit_add_response" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="ID_chapter" value="<?php echo $ID_chapter ?>">
                                    <input type="hidden" name="ID_question" value="<?php echo $ID_question ?>">
                                    <input type="hidden" name="ID_grid" value="<?php echo $ID_grid ?>">
                                    <?php if (isset($ID_response)) { ?>
                                        <input type="hidden" name="ID_response" value="<?php echo $ID_response ?>">

                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Constat</label>
                                                <div class="cal-icon">

                                                    <select class="form-control floating" name="ID_constat" id="ID_constat">
                                                        <?php
                                                        foreach ($listconstat as $row) {

                                                            if (isset($ID_constat)) {

                                                                if ($row['ID_constat'] == $ID_constat) {

                                                        ?>

                                                                    <option value=<?= $row['ID_constat'] ?> selected><?= $row['Metaphor_constat'] . ' ' . $row['Title_constat'] ?></option>

                                                                <?php } else {
                                                                ?>

                                                                    <option value=<?= $row['ID_constat'] ?>><?= $row['Metaphor_constat'] . ' ' . $row['Title_constat']  ?></option>

                                                                <?php }
                                                            } else {
                                                                ?>
                                                                <option value=<?= $row['ID_constat'] ?>><?= $row['Metaphor_constat'] . ' ' . $row['Title_constat']  ?></option>


                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <label class="focus-label">Note constat / 100</label>
                                                <input type="number" name="Value_response" value="<?php if (isset($Value_response)) {
                                                                                                        echo $Value_response;
                                                                                                    } ?>" placeholder="Value" class="form-control floating">

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

                </section>
                <!-- //forms -->
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


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