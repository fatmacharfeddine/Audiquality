<!--?php include "/../Header.php"; ?-->
<style>
    .form_add_photo {
        height: 50px;
    }
</style>

<body>

    <!--?php include "/../Menu.php"; ?-->

    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Intern Audit</h4>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">

                </div>
                <div class="col-sm-6 col-md-3">

                </div>
                <div class="col-sm-6 col-md-3">

                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="<?php echo base_url(); ?>Employee_Account/Form_add_audit?ID_audit_plan=<?php echo $ID_audit_plan ?>" class="btn btn-success btn-block"> + Add </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Departement</th>
                                    <th>January</th>
                                    <th>February</th>
                                    <th>March</th>
                                    <th>April</th>
                                    <th>Mai</th>
                                    <th>June</th>
                                    <th>July</th>
                                    <th>August</th>
                                    <th>September</th>
                                    <th>October</th>
                                    <th>November</th>
                                    <th>December</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($departement)) {
                                    foreach ($departement as $row) {
                                        //    $date = date_create($row['Create_date_audit_plan']);
                                        //    echo ($date->format('m'));
                                ?>

                                        <tr>
                                            <td><?php echo $row['Name_department']; ?></td>
                                            <!-------------Month---------->
                                            <?php $month_array = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");

                                            ?>
                                            <?php if (isset($departement)) {

                                                foreach ($departement as $row2) {
                                                    //comparaison id de tableau 1 et tableau 2 pour ecrire jours 
                                                    if ($row['ID_department'] == $row2['ID_department']) {
                                                        //End comparaison id de tableau 1 et tableau 2 pour ecrire jours 
                                                        /* echo $row['planned_date_audit'];
                                                        echo '-----';
                                                        echo $row['Year_audit_plan'];*/
                                                        $date = date_create($row2['planned_date_audit']);
                                                        $i = 0;
                                                        //pour eliminer les 12 td
                                                        $datePlanned = date_create($row['planned_date_audit']);
                                                        //     echo $datePlanned->format('y');
                                                        $Year =  date_create($Year_audit_plan);
                                                        //     echo $Year->format('y');
                                                        //     if ($datePlanned == $Year) {
                                                        foreach ($month_array as $rowdate) {

                                                            if ($date->format('m') == $month_array[$i]) {
                                                                //end pour eliminer les 12 td 
                                            ?>

                                                                <td style="background-color: #ffc800;">

                                                                    <?php
                                                                    //$date_plan = $row2['planned_date_audit'];
                                                                    echo  $date->format('d') . ' th'  ?>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td> </td>
                                            <?php }
                                                            $i = $i + 1;
                                                        }
                                                        // }
                                                    }
                                                }
                                            }
                                            ?>
                                            <!------------End Month----------->


                                        </tr>
                                <?php             }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--?php include "/../Footer.php"; ?-->

    <script>
        $(document).ready(function() {




            $("#btn_add").click(function() {
                swal({
                    title: 'Save',
                    text: "Are you sure?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancel',

                    confirmButtonText: 'Yes'
                }).then((result) => {

                    if (result.value) {
                        //$("#action").val(1);


                        $('form#audits').submit();
                        //	swal('its OK '+result.value);
                    } else {
                        swal("This operation is canceled");
                        return false;
                    }
                });
            });

        });
    </script>
    <script>
        function populate(ID_department, post) {



            var jArray = <?php echo json_encode($phpArray); ?>;
            var jArrayname = <?php echo json_encode($phpArrayname); ?>;




            var ID_department = document.getElementById(ID_department);
            var post = document.getElementById(post);
            post.innerHTML = "";
            for (var i = 0; i < jArray.length; i++) {
                if (jArray[i] == ID_department.value) {
                    var name = jArrayname[i];

                    var optionArray = ["name|".name];
                }
                alert(jArrayname[i]);
            }

            for (var option in optionArray) {
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                post.options.add(newOption);
            }
        }
    </script>
    <script>
        function triggerClick() {
            document.querySelector('#File_identification').click();
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