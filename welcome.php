<?php header("refresh:5; url=login.php")  ?>

<?php include("includes/main-rest.php") ?>

<body>
    <!-- conatiner fluid -->
    <div class="container-fluid" role="columnheader">


        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->

        <!-- row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12" role="columnheader">
                <h1 class="display-3 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"> Welcome<span style="color: green">.</span> (Email Sent)</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12 text-center" role="columnheader">
                <i class="fas fa-check-circle" role="img" style="font-size:150px; color:green; margin-bottom:30px"></i>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12 text-center" role="columnheader">
                <p class='text-center' style="font-size:17px" role="doc-notice">Welcome to the family user.<br>
                    Now you can enjoy the best home service experience.<br>
                    A welcome Email has been sent to your registerd email.<br>
                    Thankyou! for choosing us.
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12 text-center" role="columnheader">
                <h4 class="h4 text-warning">You will be redirected to login page in 10 seconds <a href="login.php">Login Now</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->



        <!-- row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12">
                <!-- footer -->
                <?php include("includes/footer.php") ?>
                <!-- /.footer -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.conatiner fluid -->
</body>
<!-- /.body -->

</html> 
<!-- /.html -->