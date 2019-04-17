<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->
<?php isset($_GET['service']) ? $service = $_GET['service'] : redirect('services') ?>
<!-- body -->


<?php

if (isset($_GET['id'])) {
    $service_id = $_GET['id'];
    $service_from_id = Services::requestName($service_id);
}


?>

<body>
    <!-- custome styles -->
    <style>
        h1>img {
            height: 80px;
            margin-right: 20px;
            transition: all .2s;
        }

        h1>img:hover {
            transform: scale(1.2);
        }

        .show {
            height: 80px;
            margin-right: 30px;
        }


        h2 {
            color: green;
        }

        .style>li {
            list-style: square;
            font-size: 15px;
        }

        .btn {
            border-radius: 0;
        }
    </style>
    <!-- /.custom styles -->
    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->

        <!-- heading row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12" role="columnheader">
                <h1 class="display-4 text-center text-capitalize" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><img src="images/service/<?php echo $service_from_id->image ?>"><?php echo $service ?><span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->

        <!-- main content -->
        <div class="col-sm-9 col-md-9 col-lg-10 mx-auto" role="columnheader">
            <div class="row">
                <div class="col-lg-12" style=" padding: 30px 50px;">
                    <div class="row">
                        <div class="col-lg-1">
                            <img src="images/service/<?php echo $service_from_id->image?>" class="show" alt="saw">
                        </div>
                        <div class="col-lg-7" style="padding:0 50px;">
                            <div class="row">
                                <h2 class="text-capitalize"><?php echo $service ?></h3>
                            </div>
                            <div class="row">
                                <h6>Our guarantee</h6>
                            </div>
                            <div class="row" class="style">
                                <ul>
                                    <li>They will attend promptly,</li>
                                    <li>They will provide the proper solutions to you,</li>
                                    <li>A figure will be quoted and the approval will be provided by Customer,</li>
                                    <li>Balance Payment will be received and receipt will be provided.</li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-4 mx-auto" style="padding:20px 30px">
                            <a href="index.php?service=<?php echo $service ?>" class="btn btn-lg btn-primary">Buy now &rarr;</a>
                        </div>
                    </div>

                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-12" style=" padding: 30px 50px;">
                    <div class="row">
                        <div class="col-lg-9 table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Nos</th>
                                        <th scope="col">Cost</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-3">
                            <div class="list-group text-capitalize">
                                <?php
                                $services = Services::find_all();
                                foreach ($services as $service_alone) {
                                    if ($service == $service_alone->service_name) {
                                        echo '<a href="detail_service.php?service=' . $service_alone->service_name . '&id='. $service_alone->service_id .'" class="list-group-item list-group-item-action active">'
                                            . $service_alone->service_name . '
                                    </a>';
                                    } else {
                                        echo '<a href="detail_service.php?service=' . $service_alone->service_name . '&id='. $service_alone->service_id .'" class="list-group-item list-group-item-action">'
                                            . $service_alone->service_name . '
                                    </a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.main content -->

        <div class="container-fluid">
            <!-- footer row -->
            <div class="row" role="row">
                <!-- col-lg-12 -->
                <div class="col-lg-12" role="columnheader">
                    <!-- footer -->
                    <?php include("includes/footer.php") ?>
                    <!-- /.footer-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.footer row -->
        </div>
        <!-- /.footer-container-fluid -->
    </div>
    <!-- /.body container-fluid -->
</body>
<!-- /.body -->

</html>