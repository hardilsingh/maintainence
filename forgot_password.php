<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<body>

    <!-- container-fluid -->
    <div class="container-fluid">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->


        <!-- heading row -->
        <div class="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12">
                <h1 class="display-4 text-center" style="margin-bottom:3rem; margin-top: 2rem"><i
                    class="fas fa-unlock-alt" style="color:green; margin-right: 1.5rem"></i>Password Reset<span
                    style="color: green">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->

        <!-- content-row -->
        <div class="row">

<!-- ---------------------------------------STEP 1------------------------------------------------------------------ -->
            <!-- col-lg-4 -->
            
            <div class="col-lg-4" style="padding:0 3rem">

                <!-- step 1 heading -->
                <h3 class="text-center" style="margin-top:1rem; font-family: 'lato' , sans-serif"><i
                        class="fas fa-envelope"></i>
                    Enter Email<span class="h2 text-danger" style="margin-left:.5rem">(Step 1)</span> </h3>
                <!-- /.step 1 heading -->

                <!-- step 1 instruction -->
                <p class="text-center" style="font-size:17px; margin-top:2rem">Please enter your email address to
                    countinue to your security questions</p>
                <!-- /.step 1 instruction -->

                <div class="text-center" style="padding:0rem 5rem">
                    <!-- panel body -->
                    <div class="panel-body">

                        <!-- form -->
                        <form id="register-form" class="form-signin" role="form" style="margin-top: 10rem"
                            autocomplete="off" class="form" method="post">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                        required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary text-uppercase" type="submit"
                                style="margin-top:1rem">Next
                                <i class="fas fa-arrow-right"></i></button>
                            <input type="hidden" class="hide" name="token" id="token" value="">
                        </form>
                        <!-- /.form -->

                    </div>
                    <!-- /.panel vody -->
                </div>
            </div>
            <!-- col-lg-4 -->

<!-- -------------------------------STEP 2----------------------------------------------------------- -->

            <!-- col-lg-4 -->
            <div class="col-lg-4">

                <!-- step 2 heading -->
                <h3 class="text-center" style="margin-top:1rem; font-family: 'lato' , sans-serif"><i
                        class="fas fa-shield-alt"></i>
                    Security Questions <span class="h2 text-danger" style="margin-left:.5rem">(Step 2)</span> </h3>
                <!-- /.step 2 heading -->

                <!-- step 2 instruction -->
                <p class="text-center" style="font-size:17px; margin-top:2rem">Please Answer the following questions to
                    reset your password</p>
                <!-- /.step 2 instruction -->



                <div class="text-center" style="padding:0rem 3rem">
                    <!-- panel body -->
                    <div class="panel-body">
                        <!-- form -->
                        <form id="register-form" class="form-signin" role="form" style="margin-top: 5rem"
                            autocomplete="off" class="form" method="post">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <select name="" id="" disabled="disabled" class="form-control myselect">
                                        <option value="#">Secutity question 1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                        required autofocus>
                                    <label for="inputEmail">Answer 1</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label-group">
                                    <select name="" id="" disabled="disabled" class="form-control">
                                        <option value="#">Security question 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                        required autofocus>
                                    <label for="inputEmail">Answer 2</label>
                                </div>
                            </div>

                            <button disabled class="btn btn-lg btn-primary text-uppercase" type="submit"
                                style="margin-top:1rem">Submit
                                <i class="fas fa-arrow-right"></i></button>

                            <input type="hidden" class="hide" name="token" id="token" value="">
                        </form>
                        <!-- /.form -->
                    </div>
                    <!-- /.panel body -->
                </div>
            </div>
            <!-- /.col-lg-4 -->


<!-- -------------------------------------------STEP 3-------------------------------------------------------- -->

            <!-- col-lg-4 -->
            <div class="col-lg-4" style="padding:0 3rem">
                <!-- step 3 heading -->
                <h3 class="text-center" style="margin-top:1rem; font-family: 'lato' , sans-serif"> <i
                        class="fas fa-key"></i>
                    New Password <span class="h2 text-danger" style="margin-left:.5rem">(Step 3)</span>
                </h3>
                <!-- /. step 3 heading -->

                <!-- step 3 instructions -->
                <p class="text-center" style="font-size:17px; margin-top:2rem">Please enter a new password</p>
                <!-- /.step 3 instructions -->

                <div class="text-center" style="padding:.5rem 3rem">
                    <!-- panel body -->
                    <div class="panel-body">
                        <form action="" method="post" class="form-signin" style="margin-top:6rem" class="form"
                            role="form">
                            <div class="form-label-group">
                                <input type="password" disabled id="inputPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">New Password</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" disabled id="confirminputPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="confirminputPassword text-center">Confirm Password</label>
                            </div>
                            <button disabled class="btn btn-lg btn-success text-uppercase" type="submit"
                                style="margin-top:1rem">Reset
                                <i class="fas fa-arrow-right"></i></button>
                        </form>
                        <!-- /.form -->
                    </div>
                    <!-- /.panel body -->
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.content row -->




        <!-- footer row -->
        <div class="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12">
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