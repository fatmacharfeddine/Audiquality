
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Function Access</h4>
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
                                    <h4 class="m-b-10"><strong>Access Group</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Name_access_group ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Function</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong><?php echo $Name_function ?></strong> <span class="float-right"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Access</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>
                                                        <?php
                                                        if ($View_functions_access == 1) {
                                                            echo 'View';
                                                        } else {
                                                            if ($Edit_functions_access == 1) {
                                                                echo 'Edit';
                                                            } else {
                                                                echo 'None';
                                                            }
                                                        }
                                                        ?>
                                                    </strong> <span class="float-right"></span></td>
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

