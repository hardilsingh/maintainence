<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<?php if (!$session->is_signed_in()) { } else {
    redirect("profile");
} ?>


<?php

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    //check database for the email and password

    $user_found = Users::verifyUser($email);

    if ($user_found) {

        if (password_verify($password, $user_found->user_password)) {

            if ($user_found->user_role == 'customer') {
                $rememberme = $_POST['rememberme'];
                if ($rememberme == 'on') {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('email', $email, $hour);
                    setcookie('password', $user_found->user_password, $hour);
                }

                //start session
                $session->login($user_found);
                if ($user_found->name == "") {
                    redirect("update_profile");
                } else {
                    redirect("profile");
                }
            } elseif ($user_found->user_role == 'admin') {
                $rememberme = $_POST['rememberme'];
                if ($rememberme == 'on') {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('email', $email, $hour);
                    setcookie('password', $user_found->user_password, $hour);
                }
                //start session
                $session->login($user_found);
                //send to profile
                redirect("admin/index");
            }
        } else {
            $msg = "<div class='alert alert-danger' role='alert'>Incorrect Email Id or Password</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger' role='alert'>Incorrect Email Id or Password</div>";
    }
} else {
    $msg = "";
    $email = "";
}

?>

<body>

    <!-- container-fluid -->
    <div class="container-fluid" role="grid">
        <?php

        if (isset($_GET['password_reset'])) {
            $msg_reset = "<div class='alert alert-success' role='alert'>Password reset was successful</div>";
        } else {
            $msg_reset = "";
        }

        ?>

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->

        <!-- container -->
        <div class="container" role="grid">
            <!-- row -->
            <div class="row" role="row">
                <!-- col-sm-7 col-md-7 col-lg-6 mx-auto -->
                <div class="col-sm-7 col-md-7 col-lg-6 mx-auto" role="columnheader" style="position:relative; top:-50%; transform:translateY(36%)">
                    <div class="login100-pic js-tilt " role="img" data-tilt>
                        <a href="index.php"><img src="images/logo.png" class="img-responsive" alt="IMG"></a>
                    </div>
                </div>
                <!-- /.col-sm-7 col-md-7 col-lg-6 mx-auto -->

                <!-- col-sm-7 col-md-7 col-lg-4 mx-auto -->
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" role="columnheader">
                    <!-- card -->
                    <div class="card card-signin my-5">
                        <!-- card-body -->
                        <div class="card-body">
                            <?php echo $msg ?>
                            <?php echo $msg_reset ?>
                            <!-- card heading -->
                            <h5 role="heading" class="card-title text-center text-success">
                                Sign In
                            </h5>
                            <!-- /.card heading -->
                            <!-- form -->
                            <form role="form" class="form-signin" method="post" action="">
                                <div role="textbox" class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" value="<?php echo htmlentities($email) ?>" placeholder="Email address" name="email" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div role="textbox" class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div role="checkbox" class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="rememberme" value="on" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Keep Me logged in</label>
                                </div>
                                <button role="button" class="btn btn-lg btn-success btn-block text-uppercase" name="login" type="submit">Sign in</button>
                                <hr class="my-4">
                                <button role="button" class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i>
                                    Sign in with Google</button>
                            </form>
                            <!-- form -->

                            <!-- options -->
                            <div role="option" class="options">
                                <a href="forgot_password.php?initial=check_account" class="forgot__password">Forgot password?</a>
                                <a href="signup.php">Sign up now</a>
                            </div>
                            <!-- /.options -->
                        </div>
                        <!-- card body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-sm-7 col-md-7 col-lg-4 mx-auto -->
            </div>
            <!-- .row -->
        </div>
        <!-- /.container -->


        <!-- row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12" role="columnheader">
                <!-- footer-->
                <?php include("includes/footer.php") ?>
                <!-- /.footer-->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container fluid -->

    <!--===============================================================================================-->
    <!-- script -->
    <script src="tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!-- /.script -->

</body>
<!-- /.body -->

</html>
<!-- /.html -->