<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->



<body>

    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->


        <!-- heading row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12" role="columnheader">
                <h1 class="display-4 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fas fa-unlock-alt" style="color:green; margin-right: 1.5rem"></i>Email Verification<span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->
        <?php $msg = "" ?>

        <?php


        if (isset($_POST['verify_email'])) {
            $otp = $_POST['otp'];

            if ($otp == $_SESSION['otp']) {
                //creating user after verifying otp
                $signup = new Users;
                $signup->user_email = $_SESSION['given_email'];
                $signup->user_password = $_SESSION['hashed_password'];
                $signup->user_role = $_SESSION['role'];
                $signup->create();
                //destroying session variables
                $_SESSION['given_email'] = null;
                $_SESSION['hashed_password'] = null;
                $_SESSION['role'] =  null;
                redirect("welcome");
            } else {
                $msg = "<div class='alert alert-danger' role='alert'>Incorrect OTP</div>";
            }
        }


        ?>


        <div class="col-sm-9 col-md-9 col-lg-4 mx-auto" role="columnheader">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center text-success" style="margin-bottom:40px" role="heading">Password Reset</h5>
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                        <?php echo $msg ?>
                    </div>
                    <form class="form-signin" action="" method="post" role="form">
                        <div class="row">
                            <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                <div class="form-label-group">
                                    <input type="text" maxlength="4" role="textbox" name="otp" id="inputotp" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputotp" role="note">OTP<span style="color:red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="verify_email">Verify Email &rarr;</button>
                            </div>
                        </div>
                    </form>
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