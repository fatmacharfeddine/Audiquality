<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title">Roles &amp; Permissions</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <a href="<?php echo site_url('Technical_Account/Form_add_access_group') ?>" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Roles</a>
                    <div class="roles-menu">
                        <ul>
                            <?php if (isset($access_group)) {
                                foreach ($access_group as $row) {
                                    if ($row['ID_access_group'] == $current_access_group) {
                            ?>

                                        <li class="active">
                                            <a href="javascript:void(0);"><?= $row['Name_access_group'] ?></a>
                                            <span class="role-action">
                                                <a href="<?php echo base_url(); ?>Technical_Account/Form_edit_access_group?ID_access_group=<?php echo $row['ID_access_group'] ?>">
                                                    <span class="action-circle large">
                                                        <i class="material-icons">edit</i>
                                                    </span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>Technical_Account/Delete_access_group?ID_access_group=<?php echo $row['ID_access_group'] ?>" data-toggle="modal" data-target="#delete_role">
                                                    <span class="action-circle large delete-btn">
                                                        <i class="material-icons">delete</i>
                                                    </span>
                                                </a>
                                            </span>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo base_url(); ?>Technical_Account/List_access_group?ID_access_group=<?php echo $row['ID_access_group'] ?>"><?= $row['Name_access_group'] ?></a></li>

                            <?php     }
                                }
                            } ?>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                    <h6 class="card-title m-b-20">Module Access</h6>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Function</th>
                                    <th class="text-center">URL</th>
                                    <th class="text-center">Access</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($functions_access)) {
                                    foreach ($functions_access as $row) {
                                        if ($row['ismain'] == 1) {
                                ?>
                                            <tr class="table-primary">
                                                <td><?= $row['Name_function'] ?></td>
                                                <td class="text-center">
                                                    <?= $row['URL_function'] ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    $exist = 0;
                                                    if (isset($current_function_access)) {

                                                        foreach ($current_function_access as $rowfunction) {

                                                            if ($row['ID_function'] == $rowfunction['ID_function']) {
                                                                $exist = 1;
                                                                if ($rowfunction['View_functions_access'] == 1) {



                                                    ?>
                                                                    <div class="dropdown action-label">
                                                                        <a class="custom-badge status-green dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                            View
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=0&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">None</a>
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=2&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">Edit</a>
                                                                        </div>
                                                                    </div>
                                                                    <?php } else {
                                                                    if ($rowfunction['Edit_functions_access'] == 1) { ?>
                                                                        <div class="dropdown action-label">
                                                                            <a class="custom-badge status-blue dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                                Edit
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=0&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">None</a>
                                                                                <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=1&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">View</a>
                                                                            </div>
                                                                        </div>
                                                                        <?php  } else {
                                                                        if (($rowfunction['View_functions_access'] == 0) && ($rowfunction['Edit_functions_access'] == 0)) {
                                                                        ?>
                                                                            <div class="dropdown action-label">
                                                                                <a class="custom-badge status-red dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                                    None
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=1&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">View</a>
                                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=2&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">Edit</a>
                                                                                </div>
                                                                            </div>
                                                            <?php  }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        if ($exist == 0) { ?>
                                                            <div class="dropdown action-label">
                                                                <a class="custom-badge status-red dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                    None
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=1&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">View</a>
                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=2&ID_function=<?php echo $row['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">Edit</a>
                                                                </div>
                                                            </div>
                                                    <?php

                                                        }
                                                    } ?>






                                                </td>

                                            </tr>
                                            <?php foreach ($functions_access as $subrow) {
                                                if ($row['ID_function'] == $subrow['parent']) { ?>
                                                    <tr>
                                                        <td><?= $subrow['Name_function'] ?></td>

                                                        <td class="text-center">
                                                            <?= $subrow['URL_function'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $exist = 0;
                                                            if (isset($current_function_access)) {

                                                                foreach ($current_function_access as $rowfunction) {

                                                                    if ($subrow['ID_function'] == $rowfunction['ID_function']) {
                                                                        $exist = 1;
                                                                        if ($rowfunction['View_functions_access'] == 1) {



                                                            ?>
                                                                            <div class="dropdown action-label">
                                                                                <a class="custom-badge status-green dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                                    View
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=0&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">None</a>
                                                                                    <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=2&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">Edit</a>
                                                                                </div>
                                                                            </div>
                                                                            <?php } else {
                                                                            if ($rowfunction['Edit_functions_access'] == 1) { ?>
                                                                                <div class="dropdown action-label">
                                                                                    <a class="custom-badge status-blue dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                                        Edit
                                                                                    </a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=0&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">None</a>
                                                                                        <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=1&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">View</a>
                                                                                    </div>
                                                                                </div>
                                                                                <?php  } else {
                                                                                if (($rowfunction['View_functions_access'] == 0) && ($rowfunction['Edit_functions_access'] == 0)) {
                                                                                ?>
                                                                                    <div class="dropdown action-label">
                                                                                        <a class="custom-badge status-red dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                                            None
                                                                                        </a>
                                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=1&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">View</a>
                                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=2&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">Edit</a>
                                                                                        </div>
                                                                                    </div>
                                                                    <?php  }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                if ($exist == 0) { ?>
                                                                    <div class="dropdown action-label">
                                                                        <a class="custom-badge status-red dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                            None
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=1&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">View</a>
                                                                            <a href="<?php echo base_url(); ?>Technical_Account/Submit_edit_function_access?action=2&ID_function=<?php echo $subrow['ID_function'] ?>&ID_access_group=<?php echo $current_access_group ?>" class="dropdown-item">Edit</a>
                                                                        </div>
                                                                    </div>
                                                            <?php

                                                                }
                                                            } ?>



                                                        </td>


                                                    </tr>
                                <?php    }
                                            }
                                        }
                                    }
                                } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--?php include "/../Footer.php"; ?-->