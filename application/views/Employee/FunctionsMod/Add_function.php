
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Function</li>
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
                                    <form action="<?php echo base_url(); ?>Employee_Account/Submit_add_function/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">function</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_functions_access)) {
                                                        ?>
                                                            <input type="hidden" name="ID_functions_access" value="<?php echo $ID_functions_access ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_function" value="<?php if (isset($Name_function)) {
                                                                                                            echo $Name_function;
                                                                                                        } ?>" placeholder="function" class="form-control">

                                                    </div>
                                                </div>

                                               
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Type</label>
                                                    <div class="col-md-10">
                                                        <div class="radio" name="type_main">
                                                            <label>
                                                                <input type="radio" name="radio" id="main" value="main" checked> Is main
                                                            </label>
                                                        </div>
                                                        <div class="radio"  name="type_parent">
                                                            <label>
                                                                <input type="radio" name="radio" id="parent" value="parent"> Has parent
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">URL</label>
                                                    <div class="col-md-9">


                                                        <input type="text" name="URL_function" id="URL_function" value="<?php if (isset($URL_function)) {
                                                                                                            echo $URL_function;
                                                                                                        } ?>" placeholder="URL" class="form-control">


                                                    </div>
                                                </div>

                                                
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Parent</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_function" id="ID_function">
                                                            <?php
                                                            foreach ($parent_list as $row) {

                                                                if (isset($parent)) {

                                                                    if ($row['ID_function'] == $parent) {

                                                            ?>

                                                                        <option value=<?= $row['ID_function'] ?> selected><?= $row['Name_function'] ?></option>

                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_function'] ?>><?= $row['Name_function'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_function'] ?>><?= $row['Name_function'] ?></option>
                                                            <?php }
                                                            }
                                                            ?>
                                                        </select>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>


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
                $('#ID_function').prop('disabled', false);
                $('#URL_function').prop('disabled', false);

            } else {
                $('#ID_function').prop('disabled', 'disabled');
                $('#URL_function').prop('disabled', 'disabled');

            }
            if ($("#main").is(":checked")) {
                $('#ID_function').prop('disabled', true);
                $('#URL_function').prop('disabled', true);

            } else {
                $('#ID_function').prop('disabled', false);
                $('#URL_function').prop('disabled', false);

            }
        };
        $(update_parent);
        $("#parent").change(update_parent);
        $("#main").change(update_parent);
    </script>
