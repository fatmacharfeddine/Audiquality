
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
            <form action="<?= base_url() ?>/Employee/edit_year" method="post">
                <div class="cards__heading">
                    <h3>Technical : <?php echo $Name_company; ?> </h3>
                </div>
                <div class="form-row">
                <input type="hidden" id ="ID_company" name="ID_company" value="<?=$ID_company ?>">

                    <div class="form-group col-md-6">
                        <label for="inputState" class="input__label">Please choose audit year</label>
                        <select id="ID_year" name="ID_year" class="form-control input-style">
                            <?php
                            if (isset($audityear)) {
                                foreach ($audityear as $row) {
                                    if ($row['ID_year'] == $ID_year) {
                            ?>
                                        <option value="<?= $row['ID_year'] ?>" selected=""><?= $row['Audit_year'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $row['ID_year'] ?>"> <?= $row['Audit_year'] ?> </option>

                            <?php }
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary btn-style mt-4">Confirm</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
