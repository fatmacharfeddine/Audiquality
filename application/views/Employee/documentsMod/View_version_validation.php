
<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Document</h4>
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
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-10">
                                <div>
                                    <h4 class="m-b-10"><strong>Document details</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>

                                            <tr>
                                                <td><strong> Version: </strong> <span class="float-right"><?php echo $Number_version ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Code: </strong> <span class="float-right"><?php echo $Code_document ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Document Title: </strong> <span class="float-right"><?php echo $Title_document ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> File: </strong> <span class="float-right"><?php echo $File_version ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Type: </strong> <span class="float-right"><?php echo $Type_doc ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Date: </strong> <span class="float-right"><?php echo $Date_version ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Created By: </strong> <span class="float-right"><?php echo $Createdby_version ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Revised By: </strong> <span class="float-right">

                                                        <?php if (!isset($Validatedby_version)) {
                                                        ?>
                                                            <span class="custom-badge status-grey">Waiting</span>

                                                        <?php
                                                        } else {
                                                            echo $Validatedby_version;
                                                        } ?>

                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Validated By: </strong> <span class="float-right">

                                                        <?php if (!isset($Validatedby_version)) {
                                                        ?>
                                                            <span class="custom-badge status-grey">Waiting</span>

                                                        <?php
                                                        } else {
                                                            echo $Validatedby_version;
                                                        } ?>

                                                    </span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-1">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

