<?php include "Header.php"; ?>
<body>

<?php include "Menu.php"; ?>

<div class="main-content">

    <!-- content -->
    <div class="container-fluid content-top-gap">

        <!-- breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb my-breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Audit Year Form</li>
            </ol>
        </nav>
        <div class="card card_border py-2 mb-4">
            <div class="card-body">

                <div class="cards__heading">
                    <h3> Department : <?php echo $Name_department; ?></h3>
                </div>


                    <?php
                    //  echo $id_comp;

                    if (isset($chap)) {
                        foreach ($chap as $row) {

                    ?>
                                    <div class="form-row">

                            <form action="<?= base_url() ?>/Employee/edit_access" method="post">

                                <input type="hidden" id="ID_access" name="ID_access" value="<?= $row['ID_access'] ?>">
                                <input type="hidden" id="ID_department" name="ID_department" value="<?= $row['ID_department'] ?>">

                                <div class="form-group col-md-8">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-8 pt-0 input__label">
                                                <?php echo $row['Title_chapter'] . ' : ' . $row['Name_chapter']; ?>
                                            </legend>

                                            <div class="col-sm-4">
                                                <?php
                                                //  echo $id_comp;

                                                if (isset($status)) {
                                                    foreach ($status as $row2) {

                                                        if ($row['ID_status'] == $row2['ID_status']) {

                                                ?>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="ID_status" id="ID_status" value="<?= $row2['ID_status'] ?>" checked>
                                                                <label class="form-check-label" for="<?= $row2['ID_status'] ?>">
                                                                    <?php echo $row2['Name_status']; ?>
                                                                </label>
                                                            </div>

                                                        <?php
                                                        } else {
                                                        ?>

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="ID_status" id="ID_status" value="<?= $row2['ID_status'] ?>">
                                                                <label class="form-check-label" for="<?= $row2['ID_status'] ?>">
                                                                    <?php echo $row2['Name_status']; ?>
                                                                </label>
                                                            </div>

                                                <?php }
                                                    }
                                                } ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-primary btn-style mt-4">Confirm</button>
                                </div>
                            </form>
                            </div>

                    <?php }
                    } ?>


            </div>
        </div>
    </div>
</div>
<?php include "Footer.php"; ?>