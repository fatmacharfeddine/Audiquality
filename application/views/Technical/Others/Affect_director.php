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
                        <li class="breadcrumb-item active" aria-current="page">Add Director</li>
                    </ol>
                </nav>
                <!-- //breadcrumbs -->
                <!-- forms -->
                <section class="forms">
                    <!-- forms 1 -->

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Choose from here</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="card-title">Department : .. </h4>
                                    <form action="<?php echo base_url(); ?>Technical/submit_affect_director" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">
                                                    <input type="hidden" name="ID_department" value="<?=$ID_department?>">

                                                    <label class="col-form-label col-md-3">List of Employees</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_employee" id="ID_employee">
                                                            <?php
                                                            foreach ($employee as $row) {
                                                            ?>
                                                                <option value=<?= $row['ID_employee'] ?>><?= $row['Name_employee'] ?></option>

                                                            <?php }

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