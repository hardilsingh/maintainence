<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<?php !$session->is_signed_in() ?: redirect('profile') ?>

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
                <h1 class="display-4 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fas fa-unlock-alt" style="color:green; margin-right: 1.5rem"></i>Password Reset<span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->

        <!-- display any error message -->
        <?php $msg = "" ?>


        <!-- ----------------------------------To send otp------------------------------------------------------- -->
        <?php
        if (isset($_POST['send_otp'])) {
            $email = trim($_POST['email']);
            $user_found = Users::forgotPasswordVerify($email);
            if ($user_found) {
                $name = $user_found->name;
                $email = $user_found->user_email;
                //genrate 4 digit random number for otp
                $otp = rand(1000, 9999);
                $id = $user_found->user_id;
                //send the otp to database for later usage
                $store_otp = Users::storeOTP($id, $otp);
                $_SESSION['id'] = $id;
                //send mail using phpmailer.
                include("includes/mail.php");
                header("Location:forgot_password.php?otp_send=true");
            } else {
                $msg = "<div class='alert alert-danger' role='alert'>Incorrect Email Id</div>";
            } //user found condition
        } //send otp condition.

        ?>
        <!-- ---------------------------------verify otp-------------------------------------------------------- -->

        <?php
        if (isset($_POST['verify_otp'])) {
            $otp = trim($_POST['otp']);
            $user_id = $_SESSION['id'];
            $find_otp = Users::find_by_id($user_id);
            $db_otp = $find_otp->otp;


            if ($otp == $db_otp) {
                header("Location:forgot_password.php?otp_verify=true");
            } else {
                $msg = "You have enterd an incorrect otp";
            }
        }

        ?>
        <!-- -----------------------------------reset password--------------------------------------------------------- -->
        <?php
        if (isset($_POST['reset_password'])) {
            $password = trim($_POST['password']);
            $confirmpassword = trim($_POST['confirmpassword']);

            if ($password == $confirmpassword) {
                $e_password = Users::encryptPassword($password);
                $id = $_SESSION['id'];
                Users::updatePassword($id, $e_password);
                header("Location:login.php?password_reset=success");
            }
        }
        ?>

        <!-- col-sm-9 col-md-9 col-lg-4 mx-auto  -->
        <div class="col-sm-9 col-md-9 col-lg-4 mx-auto" role="columnheader">
            <!-- main content -->
            <div class="card card-signin my-5">
                <!-- card content -->
                <div class="card-body">
                    <h5 class="card-title text-center text-success" style="margin-bottom:40px" role="heading">Password Reset</h5>
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                        <?php echo $msg ?>
                    </div>
                    <!-- form -->
                    <form class="form-signin" action="" method="post" role="form">

                        <!-- this is step 1 of 3 -->
                        <?php if (isset($_GET['initial'])) { ?>
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                    <div class="form-label-group">
                                        <input type="email" role="textbox" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                        <label for="inputEmail" role="note">Email <span style="color:red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                    <button class="btn btn-lg btn-success btn-block" type="submit" name="send_otp">Send OTP &rarr;</button>
                                </div>
                            </div>

                        <?php
                    } ?>
                        <!-- /.end of step 1 of 3 -->

                        <!-- step 2 of 3 -->
                        <?php if (isset($_GET['otp_send']) == true) { ?>

                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                    <div class="form-label-group">
                                        <input type="number" role="textbox" name="otp" id="inputotp" class="form-control" placeholder="OTP" required autofocus>
                                        <label for="inputotp" role="note">OTP<span style="color:red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                    <button class="btn btn-lg btn-success btn-block" type="submit" name="verify_otp">Verify &rarr;</button>
                                </div>
                            </div>


                        <?php
                    } ?>
                        <!-- /.end of step 2 of 3 -->

                        <!-- step 3 of 3 -->
                        <?php if (isset($_GET['otp_verify']) == true) { ?>

                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                    <div class="form-label-group">
                                        <input type="password" role="password" name="password" id="inputpassword" class="form-control" placeholder="OTP" required autofocus>
                                        <label for="inputpassword" role="note">Password<span style="color:red">*</span></label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" role="password" name="confirmpassword" id="inputconfirmpassword" class="form-control" placeholder="OTP" required autofocus>
                                        <label for="inputconfirmpassword" role="note">Confirm Password<span style="color:red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                                    <button class="btn btn-lg btn-success btn-block" type="submit" name="reset_password">Reset &rarr;</button>
                                </div>
                            </div>


                        <?php
                    } ?>
                        <!-- /.end of step 3 of 3 -->
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.card content -->
            </div>
            <!-- /.main content -->
        </div>
        <!-- /.col-sm-9 col-md-9 col-lg-4 mx-auto -->
        <!-- conatiner fluid -->
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
        <!-- /.conatiner-fluid -->
    </div>
</body>
<!-- /.body -->

</html>