<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Access Group</li>
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
                                    <form action="<?php echo base_url(); ?>Technical_Account/Submit_add_access_group/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">



                                                <div class="form-group row">

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">access_group</label>
                                                    <div class="col-md-9">
                                                    <?php if(isset($ID_access_group)){
                                                        ?>
                                                    <input type="hidden" name="ID_access_group" value="<?php echo $ID_access_group?>" >
                                                    <?php } ?>
                                                        <input type="text" name="Name_access_group" value="<?php if(isset($Name_access_group)){echo $Name_access_group;}?>" placeholder="access_group" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Company</label>
                                                    <div class="col-md-9">


                                                    <select class="form-control" name="ID_company" id="ID_company">
                                                            <?php
                                                            foreach ($company as $row) {

                                                                if (isset($ID_company)) {

                                                                    if ($row['ID_company'] == $ID_company) {

                                                            ?>

                                                                        <option value=<?= $row['ID_company'] ?> selected><?= $row['Name_company'] ?></option>

                                                                    <?php } else {
                                                                    ?>

                                                                        <option value=<?= $row['ID_company'] ?>><?= $row['Name_company'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_company'] ?>><?= $row['Name_company'] ?></option>


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

    <!--?php include "/../Footer.php"; ?-->