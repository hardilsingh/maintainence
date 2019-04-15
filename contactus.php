<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<style>
    .banner {
        background: linear-gradient(110deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .8) 50%, rgba(0, 128, 0, .8) 50%), url("images/b2.jpg");
        background-position: center;
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

    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->

        <!-- heading-row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12 banner" role="columnheader">
                <h1 class="display-4 text-center heading" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="far fa-id-badge" style="color:green; margin-right: 1.5rem"></i> Contact us<span style="color: green">.</span></h1>
            </div>
            <!--/.col-lg-12 -->
        </div>
        <!-- /.heading-row -->

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Conatct Us</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:35px; color:slategray">Contact us for any problem.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 mx-auto">
                <h2 class="h2 text-center display-4" style="font-size:25px; margin-bottom: 80px; color:green">We are at your service 24 x 7 365 days.</h2>
            </div>
        </div>

        <!-- content-row -->
        <div class="row" role="row">
            <div class="col-lg-12 col-sm-12 col-md-12 text-center mx-auto">
                <div class="row">
                    <!-- col-lg-6 -->
                    <div class="col-lg-6 col-md-12 col-sm-12 text-center" role="columnheader" >
                        <h4 class=" h4 " role="heading" style="padding:2rem"> <i class="fas fa-at" class="text-success"></i> You can reach us at: <a href="mailto:hardilsingh87@gmail">company@info.com</a></h4>

                        <h5 class=" h5" role="heading" style="padding:2rem"> <i class="fas fa-home" class="text-success"></i> Our office address:</h5>

                        <p style="padding:0rem 2rem" role="article">Kalanaur Rd, Near Kalsi Palace,<br> Desh Bhagat Nagar,<br> Gurdaspur,
                            Punjab
                            143521</p>

                        <span style="padding:2rem 2rem" class="text-success"><i class="fas fa-phone"></i> Ph. +91 7340910031</span>
                    </div>
                    <!-- /.col-lg-6 -->

                    <!-- col-lg-5 -->
                    <div class="col-lg-5 col-md-12 col-sm-12 embed-responsive embed-responsive-16by9" role="columnheader">
                        <iframe  class="embed-responsive-item" style="padding:30px 50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3382.24369955475!2d75.39454091516336!3d32.03559448120222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391b9262ba2fb121%3A0xbc43838fd9bd4370!2sCBA+INFOTECH%C2%AE+%7C+Php+Java+%7C+Website+Development+%7C+Projects+%7C+Industrial+Training+%7CGurdaspur+%7C+Jaipur!5e0!3m2!1sen!2sin!4v1552625993358" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!-- /.col-lg-5 -->
                </div>

            </div>
        </div>
        <!-- /.content row -->


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
    <!-- /.container-fluid -->

</body>
<!-- /.body -->

</html>
<!-- /.html -->