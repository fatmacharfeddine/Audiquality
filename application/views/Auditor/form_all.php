<?php include "Header.php"; ?>

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
            <!-- forms 1 -->


            <?php
            if (isset($chap)) {
                $i = 0;
                foreach ($chap as $row) {
                    $i = $i + 1;
            ?>
                    <div class="cards__heading">
                        <h3><?php echo $row['Title_chapter'] .' : '. $row['Name_chapter'] ?></h3>
                    </div>
                    <?php
                    if (isset($subject)) {
                        $j = 0;

                        foreach ($subject as $row2) {

                            if ($row2['ID_chapter'] == $i) {
                                $j = $j + 1;

                    ?>

                                <div class="card card_border py-2 mb-4">
                                    <div class="cards__heading">
                                        <h3 style="color: #000000"> <?php echo $row2['Title_subject'] ?> <span></span></h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($quest)) {
                                            foreach ($quest as $row3) {
                                                if (($row3['ID_chapter'] == $i) && ($row3['ID_subject'] == $j)) {
                                        ?>

                                                    <form action="add_answer" method="post">

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1" class="input__label">
                                                                <?php echo $row3['Text_question'] ?>
                                                            </label>
                                                            <input type="hidden" id ="ID_chapter" name="ID_chapter" value="<?=$row3['ID_chapter']?>">
                                                            <input type="hidden" id ="ID_question" name="ID_question" value="<?=$row3['ID_question']?>">

                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control input-style" id="Text_response" name="Text_response" placeholder="Write your answer ..."></textarea>
                                                                </div>

                                                                <div class="col-sm-2">

                                                                    <button type="submit" class="btn btn-primary btn-style mt-4">Send Answer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>


                                        <?php }
                                            }
                                        } ?>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>


            <?php
                }
            }

            ?>

            <!-- //forms 1 -->


        </section>
        <!-- //forms -->
    </div>
</div>
<?php include "Footer.php"; ?>