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
                <h1 class="display-4 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fas fa-unlock-alt" style="color:green; margin-right: 1.5rem"></i>Password Reset<span style="color: green">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->

        <!-- content-row -->
        <div class="row" role="row">
            <!-- ---------------------------------------STEP 1------------------------------------------------------------------ -->

            <?php



            if (isset($_POST['next'])) {
                $email = trim($_POST['email']);
                $user_found = Users::forgotPasswordVerify($email);
                if ($user_found) {
                    $name = $user_found->name;
                    $email = $user_found->user_email;
                    $otp = rand(1000, 9999);
                    $id = $user_found->user_id;
                    $store_otp = Users::storeOTP($id, $otp);
                    $e_id = urlencode(encryptor('encrypt', $id));
                    include("includes/mail.php");
                    header("Location:forgot_password.php?customer_id=$e_id&otp_send=true");
                } else {
                    $msg = "<div class='alert alert-danger' role='alert'>Incorrect Email Id </div>";
                }
            } else {
                $msg = "";
                $email = "";
            }




            ?>



            <!-- col-lg-4 -->
            <div class="col-lg-4" style="padding:0 3rem" role="columnheader">

                <!-- step 1 heading -->
                <h3 class="text-center" role="heading" style="margin-top:1rem; font-family: 'lato' , sans-serif"><i class="fas fa-envelope"></i>
                    Enter Email<span class="h2 text-danger" style="margin-left:.5rem">(Step 1)</span> </h3>
                <!-- /.step 1 heading -->

                <!-- step 1 instruction -->
                <p class="text-center" role="doc-notice" style="font-size:17px; margin-top:2rem">Please enter your email address to
                    countinue to your security questions</p>
                <!-- /.step 1 instruction -->

                <div class="text-center" style="padding:0rem 5rem">
                    <!-- panel body -->
                    <div class="panel-body">
                        <?php echo $msg ?>
                        <!-- form -->

                        <form id="register-form" role="form" class="form-signin" method="post" role="form" style="margin-top: 10rem" autocomplete="off" class="form" method="post">
                            <div class="form-group">
                                <?php
                                if (isset($_GET['customer_id'])) {
                                    ?>
                                <div class="form-label-group">
                                    <input type="email" disabled role="textbox" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary text-uppercase" name="next" role="button" type="submit" style="margin-top:1rem">Next
                                <i class="fas fa-arrow-right"></i></button>
                            <input type="hidden" disabled class="hide" name="token" id="token" value="">
                            <?php 
                        } else {

                            ?>

                            <div class="form-label-group">
                                <input type="email" role="textbox" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>
                    </div>
                    <button class="btn btn-lg btn-primary text-uppercase" name="next" role="button" type="submit" style="margin-top:1rem">Next
                        <i class="fas fa-arrow-right"></i></button>
                    <input type="hidden" class="hide" name="token" id="token" value="">
                    <?php 
                } ?>
                    </form>
                    <!-- /.form -->

                </div>
                <!-- /.panel vody -->
            </div>
        </div>
        <!-- col-lg-4 -->

        <!-- -------------------------------STEP 2----------------------------------------------------------- -->


        <?php

        if (isset($_GET['customer_id'])) {
            $e_id = $_GET['customer_id'];
            $id = urldecode($e_id);
            $d_id = encryptor('decrypt', $id);
        }

        if (isset($_POST['otp'])) {
            $otp = $_POST['onetimepassword'];
            $find_otp = Users::find_by_id($d_id);
            $db_otp = $find_otp->otp;
            $id = $find_otp->user_id;
            $e_id = urlencode(encryptor('encrypt', $id));


            if ($otp == $db_otp) {
                header("Location:forgot_password.php?customer_id=$e_id&otp_send=true&otp_verification=true");
            } else {
                $msg = "You have enterd an incorrect otp";
            }
        } else {
            $msg = "";
        }

        ?>

        <div class="col-lg-4" style="padding:0 3rem" role="columnheader">
            <!-- step 3 heading -->
            <h3 class="text-center" role="heading" style="margin-top:1rem; font-family: 'lato' , sans-serif"> <i class="fas fa-key"></i>
                New Password <span class="h2 text-danger" style="margin-left:.5rem">(Step 2)</span>
            </h3>
            <!-- /. step 3 heading -->

            <!-- step 3 instructions -->
            <p class="text-center" role="doc-notice" style="font-size:17px; margin-top:2rem">Please enter OTP. Sent to registered Email id</p>
            <!-- /.step 3 instructions -->

            <div class="text-center" style="padding:.5rem 3rem">
                <!-- panel body -->
                <div class="panel-body">
                    <?php echo $msg ?>
                    <form action="" role="form" method="post" class="form-signin" style="margin-top:6rem" class="form" role="form">
                        <div class="form-label-group">
                            <input type="text" role="textbox" name="onetimepassword" id="inputotp" class="form-control" placeholder="OTP" required>
                            <label for="inputotp">OTP</label>
                        </div>

                        <button role="button" name="otp" class="btn btn-lg btn-success text-uppercase" type="submit" style="margin-top:1rem">Reset
                            <i class="fas fa-arrow-right"></i></button>
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.panel body -->
            </div>
        </div>
        <!-- /.col-lg-4 -->






        <!-- -------------------------------------------STEP 3-------------------------------------------------------- -->



        <?php 

        if (isset($_POST['final'])) {
            $password = trim($_POST['password']);
            $confirmpassword = trim($_POST['confirmpassword']);

            if ($password == $confirmpassword) {
                $e_password = Users::encryptPassword($password);
                Users::updatePassword($d_id, $e_password);
                header("Location:login.php?password_reset=success");
            }
        }
        ?>

        <!-- col-lg-4 -->
        <div class="col-lg-4" style="padding:0 3rem" role="columnheader">
            <?php 
            if (isset($_GET['otp_verification'])) {


                ?>

            <!-- step 3 heading -->
            <h3 class="text-center" role="heading" style="margin-top:1rem; font-family: 'lato' , sans-serif"> <i class="fas fa-key"></i>
                New Password <span class="h2 text-danger" style="margin-left:.5rem">(Step 3)</span>
            </h3>
            <!-- /. step 3 heading -->

            <!-- step 3 instructions -->
            <p class="text-center" role="doc-notice" style="font-size:17px; margin-top:2rem">Please enter a new password</p>
            <!-- /.step 3 instructions -->

            <div class="text-center" style="padding:.5rem 3rem">
                <!-- panel body -->
                <div class="panel-body">
                    <form action="" role="form" method="post" class="form-signin" style="margin-top:6rem" class="form" role="form">
                        <div class="form-label-group">
                            <input type="password" role="textbox" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">New Password</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" role="textbox" name="confirmpassword" id="confirminputPassword" class="form-control" placeholder="Password" required>
                            <label for="confirminputPassword text-center">Confirm Password</label>
                        </div>
                        <button role="button" name='final' class="btn btn-lg btn-success text-uppercase" type="submit" style="margin-top:1rem">Reset
                            <i class="fas fa-arrow-right"></i></button>
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.panel body -->
            </div>
            <?php 
        } ?>
        </div>
        <!-- /.col-lg-4 -->
    </div>

    <!-- /.content row -->
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
    <!-- /.container-fluid -->
</body>
<!-- /.body -->

</html> 