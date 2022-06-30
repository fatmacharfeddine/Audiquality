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
                <li class="breadcrumb-item active" aria-current="page">Evaluation Form</li>
            </ol>
        </nav>
        <!-- //breadcrumbs -->
        <!-- forms -->
        <section class="forms">
            <form method="post" action="<?= base_url() ?>/Auditor/Document">
                <div class="m-t-20 text-center">
                    <input type="hidden" name="create" value="1">
                    <input type="submit" value="Create new document" class="btn btn-primary submit-btn">
                </div>
            </form>
            <form method="post" action="<?= base_url() ?>/Auditor/Document">

                <div class="m-t-20 text-center">
                    <input type="hidden" name="update" value="1">
                    <input type="submit" value="Update Document" class="btn btn-primary submit-btn">
                </div>
            </form>

            <form method="post" action="<?= base_url() ?>/Auditor/Document">

                <div class="m-t-20 text-center">
                    <input type="hidden" name="delete" value="1">
                    <input type="submit" value="Delete Document" class="btn btn-primary submit-btn">
                </div>
            </form>


        </section>
    </div>
</div>
<?php include "Footer.php"; ?>