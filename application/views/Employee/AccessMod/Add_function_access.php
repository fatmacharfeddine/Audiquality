
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Access by group</li>
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
                                    <form action="<?php echo base_url(); ?>Employee_Account/Submit_add_functions_access/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Function</label>
                                                    <div class="col-md-9">
                                                        <?php if (isset($ID_functions_access)) {
                                                        ?>
                                                            <input type="hidden" name="ID_functions_access" value="<?php echo $ID_functions_access ?>">
                                                        <?php } ?>

                                                        <select class="form-control" name="ID_function" id="ID_function">
                                                            <?php
                                                            foreach ($functions_access as $row) {
                                                                if (isset($functions_access)) {

                                                                    if ($row['ID_function'] == $ID_function) {

                                                            ?>

                                                                        <option value=<?= $row['ID_function'] ?> selected><?= $row['Name_function'] ;?></option>
                                                                        
                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_function'] ?>><?= $row['Name_function']?></option>
                                                                        

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

                                                <input type="hidden" name="ID_access_group" value="<?php echo $ID_access_group ?>">

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Access</label>
                                                    <div class="col-md-9">

                                                        <!--input type="text" name="View_functions_access" value="<?php if (isset($View_functions_access)) {
                                                                                                            echo $View_functions_access;
                                                                                                        } ?>" placeholder="function" class="form-control"-->

<div class="form-check-inline">
    <label class="form-check-label">
    <input type="radio" name="View_functions_access" value="1" class="form-check-input">
    View
    </label>
</div>
<div class="form-check-inline">
    <label class="form-check-label">
    <input type="radio" name="Edit_functions_access" value="1" class="form-check-input">
    Edit
    </label>
</div>                                              </div>
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

