<?php include "Header.php"; ?>
<body>

<?php include "Menu.php"; ?>

<div class="main-content">

    <!-- content -->
    <div class="container-fluid content-top-gap">


        <div class="w3l-about1 card card_border p-lg-5 p-3 mb-4">
            <div class="card-body py-3 p-0">
                <h3 class="block__title mb-lg-4">ISO 9001 : Chapters</h3>
                <div class="row cwp23-content">
                    <div class="col-md-12 cwp23-text">
                        <div class="row cwp23-text-cols">

                            <?php
                          //  echo $id_comp;

                            if (isset($chap)) {
                                foreach ($chap as $row) {

                            ?>
                                    <div class="col-md-3 column mt-4">
                                        <span class="fa fa-laptop icon-fea" aria-hidden="true"></span>
                                        <a href="<?php echo base_url(); ?>Employee/Form/?ID_chapter=<?php echo $row['ID_chapter']?>&ID_Technical=<?php echo $id_comp ;?>">
                                            <?php echo $row['Title_chapter'] ?></a>
                                        <p><?php echo $row['Name_chapter'] ?></p>
                                    </div>
                            <?php }
                            } ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include "Footer.php"; ?>