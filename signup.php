<?php include("includes/main-rest.php") ?>

<?php

if (isset($_POST['register'])) {
    $given_email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = $_POST['designation'];


    if ($password == $confirm_password) {
        //check if the email exits

        $email_exists = Users::emailExists($given_email);

        if ($email_exists == 0) {
            //encrypt the password
            $hashed_password = Users::encryptPassword($password);

            //send it to the database
            $signup = new Users;
            $signup->user_email = $given_email;
            $signup->user_password = $hashed_password;
            $signup->user_role = $role;
            $signup->create();
            redirect("welcome");
        } else {
            $msg = "<div class='alert alert-danger' role='alert'>The email address already exits <a href='login.php'>Login now</a></div>";
        }
    } else {
        $msg = "<div class='alert alert-danger' role='alert'>The passwords do not match</div>";
    }
} else {
    $msg = "";
    $password_msg = "";
    $email = "";
}
?>

<body>
    <div class="container-fluid signup" role="columnheader">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="row" role="row">
            <div class="col-lg-6" role="columnheader">
                <h6 class="display-4 text-center" role="heading" style="margin-top:13rem;">Already Have an Account<span style="color: green">?</span></h1>
                    <h4 class="text-center" role="heading" style="margin-top:4rem;"><a href="login.php">Sign in now. <i class="fas fa-arrow-right"></i></a>
                </h6>
            </div>


            <div class="col-sm-7 col-md-7 col-lg-3 mx-auto" role="columnheader">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center text-success" role="heading">Register now</h5>
                        <?php echo $msg ?>
                        <form class="form-signin" action="" method="post" role="form">
                            <div class="form-label-group">
                                <input type="email" role="textbox" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo htmlentities($email) ?>" required autofocus>
                                <label for="inputEmail" role="note">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" role="textbox" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" role="textbox" name="confirm_password" id="confirminputPassword" class="form-control" placeholder="Confirm password" required>
                                <label for="confirminputPassword">Confirm Password</label>
                            </div>
                            <div role="checkbox" class="custom-control custom-checkbox mb-3">
                                <input type="radio" checked class="custom-control-input" name="designation" value="customer" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Customer</label>
                            </div>
                            <div role="checkbox" class="custom-control custom-checkbox mb-3">
                                <input type="radio" class="custom-control-input" name="designation" value="provider" id="provider">
                                <label class="custom-control-label" for="provider">Service Provider</label>
                            </div>
                            <button role="button" class="btn btn-lg btn-success btn-block text-uppercase" name="register" type="submit">Register</button>
                            <hr class="my-4">
                            <button role="button" class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i>
                                Sign up with Google</button>
                            <button role="button" class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i>
                                Sign up with Facebook</button>
                        </form>
                        <div class="options" role="option">
                            <!-- <a href="" class="signup">Already have an account? Sign in</a> -->
                        </div>
                    </div>
                </div>
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