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
                                                <td><strong> Title Document: </strong> <span class="float-right"><?= $Title_entete ?></span></td>
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
                                                <td><strong> Form: </strong>
                                                    <span class="float-right">
                                                        <a href="<?php echo base_url() ?>/Technical_Account/<?php echo $Title_link_doc_entete ?>">View Form</a>
                                                    </span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td><strong> Link document upload: </strong> <span class="float-right"><?= $Title_link_doc_entete ?></span></td>
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