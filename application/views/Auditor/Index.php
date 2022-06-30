<?php include "Header.php"; ?>
<body>
    <?php
    foreach ($css_files as $file) : ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
<?php include "Menu.php"; ?>




<?php
foreach ($css_files as $file) : ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">

            <div style='height:20px;'></div>
            <div style="padding: 10px">
                <?php echo $output; ?>
            </div>
            <?php foreach ($js_files as $file) : ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>


        </div>
    </div>

</div>


<?php include "Footer.php"; ?>