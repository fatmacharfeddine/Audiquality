
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <!-- content -->
            <div class="container-fluid content-top-gap">

                <!-- breadcrumbs -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb my-breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Positions</li>
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
                                    <form action="<?php echo base_url(); ?>Employee_Account/Submit_add_employee_new/" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Name Employee</label>
                                                    <div class="col-md-9">
                                                        <!--input type="hidden" name="ID_department" value="<?php echo $ID_department ?>"-->

                                                        <?php if (isset($ID_employee)) {
                                                        ?>
                                                            <input type="hidden" name="ID_employee" value="<?php echo $ID_employee ?>">
                                                        <?php } ?>
                                                        <input type="text" name="Name_employee" value="<?php if (isset($Name_employee)) {
                                                                                                            echo $Name_employee;
                                                                                                        } ?>" placeholder="Name employee" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Lastname employee</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Lastname_employee" value="<?php if (isset($Lastname_employee)) {
                                                                                                                echo $Lastname_employee;
                                                                                                            } ?>" placeholder="Lastname employee" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Phone employee</label>
                                                    <div class="col-md-9">

                                                        <input type="text" name="Phone_employee" value="<?php if (isset($Phone_employee)) {
                                                                                                            echo $Phone_employee;
                                                                                                        } ?>" placeholder="Phone" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Email employee</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="Email_employee" value="<?php if (isset($Email_employee)) {
                                                                                                            echo $Email_employee;
                                                                                                        } ?>" placeholder="Email" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Login employee</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="Login_employee" value="<?php if (isset($Login_employee)) {
                                                                                                            echo $Login_employee;
                                                                                                        } ?>" placeholder="Login" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Password employee</label>
                                                    <div class="col-md-9">
                                                        <input type="password" name="Password_employee" value="<?php if (isset($Password_employee)) {
                                                                                                                    echo $Password_employee;
                                                                                                                } ?>" placeholder="Password" class="form-control">

                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-3">Access group</label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" name="ID_access_group" id="ID_access_group">
                                                            <?php
                                                            foreach ($accessgroup as $row) {

                                                                if (isset($ID_access_group)) {

                                                                    if ($row['ID_access_group'] == $ID_access_group) {

                                                            ?>

                                                                        <option value=<?= $row['ID_access_group'] ?> selected><?= $row['Name_access_group'] ?></option>

                                                                    <?php } else {
                                                                    ?>
                                                                        <option value=<?= $row['ID_access_group'] ?>><?= $row['Name_access_group'] ?></option>

                                                                    <?php }
                                                                } else {
                                                                    ?>
                                                                    <option value=<?= $row['ID_access_group'] ?>><?= $row['Name_access_group'] ?></option>
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

