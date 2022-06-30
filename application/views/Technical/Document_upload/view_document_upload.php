<!--?php include "/../Header.php"; ?-->

<body>

    <!--?php include "/../Menu.php"; ?-->

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
                                                <td><strong> Title Document: </strong> <span class="float-right"><?= $Name_document_upload ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Type Document: </strong> <span class="float-right"><?= $Code_doc_type . ' : ' . $Type_doc ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Processus: </strong> <span class="float-right"><?= $Prefix_processus . ' : ' . $Title_processus ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Chapter: </strong> <span class="float-right"><?= $Name_function ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Pages number: </strong> <span class="float-right"><?= $nbrpage_document_upload ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> File: </strong>
                                                    <span class="float-right">
                                                        <a href="<?php echo base_url() ?>/<?php echo $URL_link_document_upload ?>/<?php echo $File_document_upload ?>">Open File</a>
                                                    </span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><strong> Link document upload: </strong> <span class="float-right"><?= $Title_link_document_upload ?></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong> Code_document_upload: </strong> <span class="float-right"><?= $code_document_upload ?> </span></td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-1">
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <h1> Old Versions : </h1>
                                    <table class="table table-striped custom-table">
                                        <thead>
                                            <tr>
                                                <th>Title Document</th>
                                                <th>Type Document</th>
                                                <th>Processus</th>
                                                <th>Chapter</th>
                                                <th>Pages number</th>
                                                <th>File</th>
                                                <th>Link</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($document_version as $row) {
                                                if (($row['ID_document_upload'] != $ID_document_upload) && ($row['ID_link_document_upload'] == $ID_link_document_upload) && ($row['ID_processus'] == $ID_processus)) { ?>
                                                    <tr>
                                                        <td><?= $row['Name_document_upload'] ?></td>
                                                        <td><?= $row['Code_doc_type'] . ' : ' . $row['Type_doc'] ?></td>
                                                        <td><?= $row['Prefix_processus'] . ' : ' . $row['Title_processus'] ?></td>
                                                        <td><?= $row['Name_function'] ?></td>
                                                        <td><?= $row['nbrpage_document_upload'] ?></td>
                                                        <td><a href="<?php echo base_url() ?>/<?php echo $row['URL_link_document_upload'] ?>/<?php echo $row['File_document_upload'] ?>">Open File</a></td>
                                                        <td><?= $row['Title_link_document_upload'] ?></td>
                                                        <td><?= $row['code_document_upload'] ?></td>


                                                    </tr>
                                            <?php    }
                                            } ?>


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

    <!--?php include "/../Footer.php"; ?-->


    <script>
        function triggerClick() {
            document.querySelector('#File_training_evaluation_emp').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>