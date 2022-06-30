<?php include "Header.php"; ?>

<body>

    <?php include "Menu.php"; ?>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Evaluation Form</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Update Document</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="card-title">Title Doc : .. </h4>
                                    <h4 class="card-title">Department : .. </h4>
                                    <form action="<?php echo base_url(); ?>Employee/submit_update_doc" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">File Document</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="file" name="File_version" value="<?= $File_version ?>">
                                                    </div>
                                                </div>

                                                <input type="hidden" name="ID_document" value="<?= $ID_document ?>" class="form-control">

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Type Document</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_doc" id="ID_doc">
                                                            <?php
                                                            foreach ($type as $row) {
                                                                if ($row['ID_doc'] == $ID_doc) {
                                                            ?>
                                                                    <option value=<?= $row['ID_doc'] ?>><?= $row['Type_doc'] ?></option selected>

                                                                <?php } else { ?>

                                                                    <option value=<?= $row['ID_doc'] ?>><?= $row['Type_doc'] ?></option>

                                                            <?php }
                                                            }

                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
    <?php include "Footer.php"; ?>