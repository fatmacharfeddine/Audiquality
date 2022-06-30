
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">employees</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">

                        <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="payslip-title">Details</h4>

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Name employee</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Name_employee ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Lastname employee</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Lastname_employee ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Phone employee</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Phone_employee ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Email Employee</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Email_employee ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Login employee</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Login_employee ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Password employee</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>
                                                        <?php
                                                        $pwd = '';
                                                        for ($i = 0; $i <= strlen($Num_pwd_employee) + 1; $i++) {
                                                            $pwd = $pwd . '*';
                                                        }
                                                        ?>
                                                    </strong> <?php echo $pwd ?><span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Name Position</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <?php if (isset($Name_post)) {
                                                ?>
                                                    <td><strong><?php echo $Name_post ?></strong> <span class="float-right"></span></td>

                                                <?php
                                                } else {
                                                ?>
                                                    <td><strong style="color:red">Not affected</strong> <span class="float-right"></span></td>

                                                <?php
                                                }
                                                ?>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Access group</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Name_access_group ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

