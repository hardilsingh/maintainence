<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->



<body>

    <style>
        body {
        }


        .card {
            position: relative;
            left: 50%;
            transform: translateX(-50%) scale(1);
            padding: 0;
            border-radius: 0;
            text-align: center;
            margin: 0;
            transition: all .2s;
            z-index: 1000;
        }

        .card:hover {
            outline-color:forestgreen;
            outline-width: 2px;
            outline-style: solid;
            box-shadow: 0 15px 20px gray;
            transform:  translateX(-50%)  scale(1.1);
            z-index: 1000000;
        }


        .col-lg-4 {
            padding: 20px 30px;
        }

        .card-title {
            color: green;
            font-size: 28px;
        }

        .card-img-top {
            height: 100px;
            padding: 20px 0;
        }

        .card-text {
            color: dimgray;
            padding: 15px 25px;
        }

        .btn {
            border-radius: 0;
        }

        .card-body {
            padding: 0;
        }
    </style>

    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->


        <!-- heading row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12" role="columnheader">
                <h1 class="display-4 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fab fa-servicestack" style="color:green; margin-right: 1.5rem"></i>Services<span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->



        <div class="col-sm-9 col-md-9 col-lg-10 mx-auto" role="columnheader">
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12">
                    <div class="row" style="position: relative;left: 50%;transform: translateX(-50%);">
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="images/saw.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Carpenter</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="detail_service.php?service=carpenter" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="images/resume.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Jobs</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="detail_service.php?service=jobs" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="images/broken-cable.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Electrician</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="detail_service.php?service=electrician" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row" style="margin-top:40px">
                <div class="col-lg-12">
                    <div class="row" style="position: relative;left: 50%;transform: translateX(-50%);">
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="images/car.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Auto Repair</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="detail_service.php?service=auto-repair" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="images/faucet.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Plumber</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="detail_service.php?service=plumber" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="images/first-aid-kit.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Hospital</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="detail_service.php?service=hospital" class="btn btn-block btn-success btn-lg">View details &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

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
    </div>
</body>
<!-- /.body -->

</html>