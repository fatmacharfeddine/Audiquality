
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
                                                <td><strong> File: </strong>
                                                    <span class="float-right">
                                                        <a href="<?php echo base_url(); ?>uploads/Document/<?php echo $File_version ?>">Open File</a>
                                                    </span>
                                                </td>
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



                                                        <?php
                                                        if ($Revisedby_version == ' ') {
                                                            if ($session_cu == 3) {
                                                        ?>
                                                                <a href="<?php echo base_url(); ?>Employee_Account/view_version?ID_version=<?php echo $ID_version ?>&action=accept" class="btn btn-outline-primary take-btn">Accept</a>
                                                                <a href="<?php echo base_url(); ?>Employee_Account/view_version?ID_version=<?php echo $ID_version ?>&action=refuse" class="btn btn-outline-primary take-btn">Refuse</a>

                                                            <?php } else { ?>
                                                                <span class="custom-badge status-grey">Waiting</span>

                                                            <?php }
                                                        } else if ($Refusedstatus_version == 1) { ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                                            <span class="custom-badge status-red">Refused : <?php echo $Revisedby_version; ?></span>
                                                        <?php    } else { ?>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                                            <span class="custom-badge status-green">Accepted : <?php echo $Revisedby_version; ?></span>
                                                        <?php }
                                                        ?>



                                                    </span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Validated By: </strong> <span class="float-right">

                                                        <?php if (($Validatedby_version) == ' ') {
                                                            if ($Refusedstatus_version == 0) {


                                                                if (($session_cu == 4) && ($Revisedby_version != ' ')) {
                                                        ?>
                                                                    <a href="<?php echo base_url(); ?>Employee_Account/view_version?ID_version=<?php echo $ID_version ?>&action=accept" class="btn btn-outline-primary take-btn">Accept</a>
                                                                    <a href="<?php echo base_url(); ?>Employee_Account/view_version?ID_version=<?php echo $ID_version ?>&action=refuse" class="btn btn-outline-primary take-btn">Refuse</a>
                                                                <?php } else { ?>
                                                                    <span class="custom-badge status-grey">Waiting</span>

                                                                <?php }
                                                            } else if ($Refusedstatus_version == 1) {
                                                            } else if ($Refusedstatus_version == 2) { ?>
                                                                <span class="custom-badge status-red">Refused : <?php echo $Validatedby_version; ?></span>

                                                            <?php }
                                                        } else {
                                                            if ($Refusedstatus_version == 0) { ?>
                                                                <span class="custom-badge status-green">Accepted : <?php echo $Validatedby_version; ?></span>
                                                                <?php
                                                                ?>
                                                            <?php  } else {
                                                            ?>
                                                                <span class="custom-badge status-red">Refused : <?php echo $Validatedby_version; ?></span>

                                                        <?php
                                                            }
                                                        }
                                                        ?>

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

