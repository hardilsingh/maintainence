<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<body>
    <!-- custom style -->
    <style>
        .card {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 20px;
            height: 500px;
            box-shadow: 0 10px 40px gray;
        }



        .banner {
            background: linear-gradient(110deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .8) 50%, rgba(0, 128, 0, .8) 50%), url("images/b4.jpg");
            height: 300px;
            background-size: cover;
            width: 100%;
            background-position: center;
        }

        .heading {
            position: relative;
            top: 50%;
            transform: translateY(-100%);
            font-weight: bolder;
            color: whitesmoke;
            font-family: lato, sans-serif;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 20px 30px;
        }
    </style>
    <!-- /.custom style -->

    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->

        <!-- heading row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12 banner" role="columnheader">
                <h1 class="display-4 text-center heading" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="far fa-address-card" style="color:green; margin-right: 1.5rem"></i></i>About us<span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:35px; color:slategray">Who are we?</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:25px; margin-bottom: 80px; color:green">Read about our history and our dedicated team.</h2>
            </div>
        </div>
        <!-- main content -->
        <div class="col-sm-9 col-md-9 col-lg-12 mx-auto " role="columnheader">
            <div class="row">
                <div class="col-lg-6" style="margin-bottom:20px; padding:50px 50px">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/hero-1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/hero-5 (2).jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/hero-6.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-12 col-sm-11 col-lg-6 mx-auto" style="padding:30px">
                    <div class="row">
                        <div class=" col-lg-8 mx-auto">
                            <h6 class="text-success display-4 text-center" style="margin-bottom:10px;font-size: 40px;">
                                Our History</h6>
                        </div>
                    </div>
                    <div class="row" style="transform:translateY(10px)">
                        <div class="col-lg-8 col-md-10 col-sm-12 mx-auto" style="font-size:17.5px; color:dimgrey">
                            <p class="text-justify">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eligendi pariatur cumque ullam quasi
                                repellat totam qui? Sed doloremque officiis aliquam! Minus
                                sit illum accusantium vero laudantium molestias nostrum
                                aliquid soluta?</p>
                            <p class="text-justify">n ligula arcu, luctus nec justo et, rhoncus maximus ex.
                                Praesent varius, urna et auctor consectetur, quam arcu
                                mollis sapien, et porta lacus lectus nec urna. Nam mi nibh,
                                suscipit id pretium vitae, placerat in orci. Pellentesque
                                fringilla mi id suscipit
                                leo.</p>

                            <p class="text-justify">consectetur, quam arcu
                                mollis sapien, et porta lacus lectus nec urna. Nam mi nibh,
                                suscipit id pretium vitae,
                                Vestibulum viverra enim eget lectus sollicitudin luctus.
                                Nulla vitae neque sollicitudin, rhoncus est id, fringilla
                                leo.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row" class="row-centered" style="background-color:whitesmoke">
                <div class="col-lg-12 col-md-12 col-sm-12 mx-auto  col-centered" style="padding:80px">
                    <div class="row" style="margin-bottom:20px;">
                        <div class=" col-lg-12 col-sm-12 col-md-12 mx-auto">
                            <h2 class="text-success display-4 text-center" style="margin-bottom:20px; font-size: 38px; padding:0 31px">Meet The Team</h6>
                            <h3 class="text-success display-4 text-center" style="margin-bottom:20px; font-size: 25px; padding:0 31px">The dedicated development team</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 my-auto " style="text-align:center">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="height:400px; object-fit: cover;" src="images/p9.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="text-left" style="font-weight:bold; font-size: 20px;">Hardil Singh</p>
                                    <p class="text-left text-success" style="transform:translateY(-10px)">Developer And
                                        Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mx-auto">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="height:400px;  object-fit: cover;" src="images/p10.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="text-left" style="font-weight:bold; font-size: 20px;">Mansimar Singh</p>
                                    <p class="text-left text-success" style="transform:translateY(-10px)">Research and Development</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mx-auto">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="height:400px;  object-fit: cover;" src="images/p11.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="text-left" style="font-weight:bold; font-size: 20px;">Deepinder Singh</p>
                                    <p class="text-left text-success" style="transform:translateY(-10px)">Graphics Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.main-content -->
    </div>

    <!-- slider script -->
    <script>
        $('.carousel').carousel({
            interval: 2000
        })
    </script>
    <!-- /.slider script -->


    <div class=" container-fluid">
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
    <!-- /.footer conatiner fluid -->
    </div>
    </div>
</body>
<!-- /.body -->

</html>