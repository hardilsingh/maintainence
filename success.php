
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
                <h1 class="display-3 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"> Success<span style="color: green">!</span></h1>
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
                <span style="font-size:20px; padding:20px 10px; color:red;" role="text">Your request No :
                    <?php
                    $last_id = Requests::selectMaxId();
                    foreach ($last_id as $refrence_id) {
                        echo $refrence_id->refrence_id;
                    }
                    ?>
                </span><br>
                Please keep it with you for future refrence.
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- conatiner -->
        <div class="container" role="columnheader">
            <div class="row" style="margin-top:30px">
                <!-- col-lg-12 -->
                <div class="col-lg-12 text-center mx-auto" role="columnheader">
                    <span style="font-size:18px" role="doc-notice">Your request has been submitted successfully.<br>
                        Our service executive will get in touch with you shortly.
                    </span><br>
                    <span role="doc-notice">If you have any complaints or suggestions you can ring up our customer care for the same.</span>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>

        <!-- row -->
        <div class="row" role="row" style="margin-top:20px">
            <!-- col-lg-12 -->
            <div class="col-lg-12 text-center" role="columnheader">
                <h4 class="h4 text-warning">You will be redirected to Home page in 10 seconds <a href="index.php">Home</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.conatiner -->


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