<?php include("includes/main-rest.php") ?>


<body>
    <div class="container-fluid signup">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="row">
            <div class="col-lg-6">
                <h6 class="display-4 text-center" style="margin-top:13rem;">Already Have an Account<span style="color: green">?</span></h1>
                    <h4 class="text-center" style="margin-top:4rem;"><a href="login.html">Sign in now. <i class="fas fa-arrow-right"></i></a>
                </h6>
            </div>


            <div class="col-sm-7 col-md-7 col-lg-3 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center text-success">Register now</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="confirminputPassword" class="form-control" placeholder="Confirm password" required>
                                <label for="confirminputPassword">Confirm Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">By checking this box you agree to our tearms and conditions.</label>
                            </div>

                            <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Register</button>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i>
                                Sign up with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i>
                                Sign up with Facebook</button>
                        </form>
                        <div class="options">
                            <!-- <a href="" class="signup">Already have an account? Sign in</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-lg-12">

                <!-- START OF FOOTER -->
                <?php include("includes/footer.php") ?>
                <!-- /END OF FOOTER -->

            </div>
        </div>

    </div>

    <!--===============================================================================================-->
    <script src="tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
</body>

</html> 