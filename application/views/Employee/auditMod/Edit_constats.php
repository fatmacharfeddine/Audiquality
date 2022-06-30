<!--script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<script src="https://cdn.tiny.cloud/1/na6192bwoalnkxq15j8wmvj3h45wfq8yxguarjbgqz0mmax0/tinymce/5/tinymce.min.js"></script-->

<body>

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="card-box profile-header">
                <div class="row">
                    <!--------------- Table Constat ------------------->

                    <table class="table table-border table-striped custom-table datatable mb-0 dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th>Constat</th>
                                <th>Evaluation</th>
                                <th>Réf : § ISO 9001 ou SMQ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (isset($survey)) {

                            ?>
                                <form id="audits" enctype="multipart/form-data" action="<?php echo base_url(); ?>Employee_Account/submit_constat?submit=2" enctype="multipart/form-data" method="post">

                                    <tr role="row" class="odd">
                                        <td style="width: 500px;">
                                        <input type="hidden" class="form-control" name="ID_survey" value="<?php echo $ID_survey; ?>">
                                        <input type="hidden" class="form-control" name="ID_audit" value="<?php echo $ID_audit; ?>">
                                        <textarea class="form-control" name="Text_survey"><?php echo $Text_survey ?></textarea></td>
                                       
                                        <td> <select class="form-control" name="ID_constat" id="ID_constat">
                                                <?php
                                                foreach ($constat as $row) {

                                                    if (isset($ID_constat)) {

                                                        if ($row['ID_constat'] == $ID_constat) {

                                                ?>

                                                            <option value=<?= $row['ID_constat'] ?> selected><?= $row['Title_constat'] ?></option>

                                                        <?php } else {
                                                        ?>

                                                            <option value=<?= $row['ID_constat'] ?>><?= $row['Title_constat'] ?></option>

                                                        <?php }
                                                    } else {
                                                        ?>
                                                        <option value=<?= $row['ID_constat'] ?>><?= $row['Title_constat'] ?></option>


                                                <?php }
                                                }
                                                ?>


                                            </select> </td>

                                        <td> <input class="form-control" type="text" name="Chaptre_Reference_survey" value="<?php echo $Chaptre_Reference_survey ?>"></td>

                                        <td class="text-right">
                                            <button id="btn_add" type="submit" class="btn btn-primary">Confirm</button>
                                        </td>


                                    </tr>
                                </form>
                            <?php }
                            ?>
                        </tbody>
                    </table>

                    <!--------------- End Table Constat ------------------->


                </div>
            </div>
        </div>

    </div>

