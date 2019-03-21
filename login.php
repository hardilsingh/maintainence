<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<body>

    <!-- container-fluid -->
    <div class="container-fluid" role="grid">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->

        <!-- container -->
        <div class="container" role="grid">
            <!-- row -->
            <div class="row" role="row">
                <!-- col-sm-7 col-md-7 col-lg-6 mx-auto -->
                <div class="col-sm-7 col-md-7 col-lg-6 mx-auto" role="columnheader" style="margin-top:8rem;">
                    <div class="login100-pic js-tilt " role="img" data-tilt>
                        <img src="images/img-01.png" class="img-responsive" alt="IMG">
                    </div>
                </div>
                <!-- /.col-sm-7 col-md-7 col-lg-6 mx-auto -->

                <!-- col-sm-7 col-md-7 col-lg-4 mx-auto -->
                <div class="col-sm-7 col-md-7 col-lg-4 mx-auto" role="columnheader">
                    <!-- card -->
                    <div class="card card-signin my-5">
                        <!-- card-body -->
                        <div class="card-body">
                            <!-- card heading -->
                            <h5 role="heading" class="card-title text-center text-success">
                                Sign In
                            </h5>
                            <!-- /.card heading -->
                            <!-- form -->
                            <form role="form" class="form-signin" method="post" action="">
                                <div role="textbox" class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                        name="email" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div role="textbox" class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" name="password"
                                        placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div role="checkbox" class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                                </div>
                                <button role="button" class="btn btn-lg btn-success btn-block text-uppercase" name="login"
                                    type="submit">Sign in</button>
                                <hr class="my-4">
                                <button role="button"class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                        class="fab fa-google mr-2"></i>
                                    Sign in with Google</button>
                                <button role="button" class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                        class="fab fa-facebook-f mr-2"></i>
                                    Sign in with Facebook</button>
                            </form>
                            <!-- form -->

                            <!-- options -->
                            <div role="option" class="options">
                                <a href="forgot_password.html" class="forgot__password">Forgot password?</a>
                                <a href="#">Sign up now</a>
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