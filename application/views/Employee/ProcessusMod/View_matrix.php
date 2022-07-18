<body>


    <div class="page-wrapper" style="min-height: 314px;">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <?php foreach ($processus as $row) { ?>
                                        <th><?php echo $row['Title_processus'] ?></th>
                                    <?php    } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($processus as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['Title_processus'] ?></td>
                                    
                                    </tr>

                                <?php    } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>