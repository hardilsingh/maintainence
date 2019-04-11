<?php include("includes/main-rest.php") ?>
<style>
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
        margin-bottom: 50px;
    }


    .card:hover {
        outline-color: forestgreen;
        outline-width: 2px;
        outline-style: solid;
        box-shadow: 0 15px 20px gray;
        transform: translateX(-50%) scale(1.1);
        z-index: 1000000;
    }


    .card>img {
        height: 185px;
        width: 100%;
        object-fit: cover;
        z-index: 100;
    }

    .card-body {
        padding: 0;
    }

    .btn {
        border-radius: 0px;
    }

    .card-title {
        padding: 10px 0px;
        display: block;
        background-color: black;
        text-transform: uppercase;
    }

    .img-top {
        position: absolute;
        height: 185px;
        width: 100%;
        background-color: rgba(0, 0, 0, .7);
        z-index: 10000000;
    }

    .price {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100000000000;
        background-color: green;
        font-size: 35px;
        font-weight: bolder;
        padding: 5px 5px;
        width: 100%;
        color: whitesmoke;
    }

    .banner {
        background: linear-gradient(110deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .8) 50%, rgba(0, 128, 0, .8) 50%), url("images/b1.jpg");
        height: 300px;
        background-size: cover;
        width: 100%;
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

<body>
    <div role="columnheader" class="container-fluid signup">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="row" role="row">
            <div class="col-lg-12 banner" role="columnheader">
                <h6 class="display-4 text-center heading" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i
                        class="fas fa-id-card-alt" style="color:green; margin-right: 1.5rem"></i>Membership Plans<span
                        style="color: green">.</span></h1>
                </h6>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Membership Plans</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:35px; color:slategray">Please select a membership
                    to proceed.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:25px; margin-bottom: 90px; color:green">You can
                    cancel the membership plan at anytime.</h2>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto" role="columnheader" style="padding: 20px 30px;">
            <div class="row">
                <div class="col-sm-9 col-md-9 col-lg-3 mx-auto" role="columnheader">
                    <div class="card" style="width: 18rem;">
                        <div class="img-top">
                            <span class="price">
                                Free
                            </span>
                        </div>
                        <img class="card-img-top" src="images/hero-6.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="color:white">Free</h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <a href="#" class="card-link btn btn-success btn-lg btn-block">Subscribe (1 week) &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-3 mx-auto" role="columnheader">
                    <div class="card" style="width: 18rem;">
                        <div class="img-top">
                            <span class="price">
                                ₹ 800
                            </span>
                        </div>

                        <img class="card-img-top" src="images/hero-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="color:silver">Silver</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link btn btn-success btn-lg btn-block">Subscribe (1 Month)
                                &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-3 mx-auto" role="columnheader">
                    <div class="card" style="width: 18rem;">
                        <div class="img-top">
                            <span class="price">
                                ₹ 1500
                            </span>
                        </div>

                        <img class="card-img-top" src="images/hero-5 (3).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="color:goldenrod">Gold</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link btn btn-success btn-lg btn-block">Subscribe (4 Months)
                                &rarr;</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 col-md-9 col-lg-3 mx-auto" role="columnheader">
                    <div class="card" style="width: 18rem;">
                        <div class="img-top">
                            <span class="price">
                                ₹ 2500
                            </span>
                        </div>

                        <img class="card-img-top" src="images/hero-5 (2).jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title" style="color:paleturquoise">Platinum</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Dapibus ac facilisis in</li>
                                            <li class="list-group-item">Vestibulum at eros</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link btn btn-success btn-lg btn-block">Subscribe (6 Months)
                                &rarr;</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ol style="color:gray">
                    <li>By clicking on subscribe you agree to our terms and services.</li>
                    <li>You can revert back to no plan at any time.</li>
                    <li>Your outstanding blance will not be refunded.</li>
                    <li>The membership will get cancelled at the end of your time period.</li>
                </ol>
            </div>
        </div>


        <div class="row" role="row">
            <div class="col-lg-12" role="columnheader">

                <!-- START OF FOOTER -->
                <?php include("includes/footer.php") ?>
                <!-- /END OF FOOTER -->

            </div>
        </div>
    </div>
</body>

</html>