<?php include("includes/main-rest.php") ?>


<body>
    <div class="container-fluid">

        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-4 text-center" style="margin-bottom:3rem; margin-top: 2rem"><i class="fas fa-unlock-alt" style="color:green; margin-right: 1.5rem"></i>Password Reset<span style="color: green">.</span></h1>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4" style="padding:0 3rem">
                <h3 class="text-center" style="margin-top:1rem; font-family: 'lato' , sans-serif"><i class="fas fa-envelope"></i>
                    Enter Email<span class="h2 text-danger" style="margin-left:.5rem">(Step 1)</span> </h3>

                <p class="text-center" style="font-size:17px; margin-top:2rem">Please enter your email address to
                    countinue to your security questions</p>
                <div class="text-center" style="padding:0rem 5rem">
                    <div class="panel-body">

                        <form id="register-form" class="form-signin" role="form" style="margin-top: 10rem" autocomplete="off" class="form" method="post">

                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary text-uppercase" type="submit" style="margin-top:1rem">Next
                                <i class="fas fa-arrow-right"></i></button>

                            <input type="hidden" class="hide" name="token" id="token" value="">
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <h3 class="text-center" style="margin-top:1rem; font-family: 'lato' , sans-serif"><i class="fas fa-shield-alt"></i>
                    Security Questions <span class="h2 text-danger" style="margin-left:.5rem">(Step 2)</span> </h3>

                <p class="text-center" style="font-size:17px; margin-top:2rem">Please Answer the following questions to
                    reset your password</p>



                <div class="text-center" style="padding:0rem 3rem">
                    <div class="panel-body">

                        <form id="register-form" class="form-signin" role="form" style="margin-top: 5rem" autocomplete="off" class="form" method="post">

                            <div class="form-group">
                                <div class="form-label-group">
                                    <select name="" id="" disabled="disabled" class="form-control myselect">
                                        <option value="#">Secutity question 1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
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
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Answer 2</label>
                                </div>
                            </div>


                            <button disabled class="btn btn-lg btn-primary text-uppercase" type="submit" style="margin-top:1rem">Submit
                                <i class="fas fa-arrow-right"></i></button>

                            <input type="hidden" class="hide" name="token" id="token" value="">
                        </form>

                    </div>
                </div>


            </div>





            <div class="col-lg-4" style="padding:0 3rem">
                <h3 class="text-center" style="margin-top:1rem; font-family: 'lato' , sans-serif"> <i class="fas fa-key"></i>
                    New Password <span class="h2 text-danger" style="margin-left:.5rem">(Step 3)</span> </h3>
                <p class="text-center" style="font-size:17px; margin-top:2rem">Please enter a new password</p>

                <div class="text-center" style="padding:.5rem 3rem">
                    <div class="panel-body">
                        <form action="" method="post" class="form-signin" style="margin-top:6rem" class="form" role="form">
                            <div class="form-label-group">
                                <input type="password" disabled id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">New Password</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" disabled id="confirminputPassword" class="form-control" placeholder="Password" required>
                                <label for="confirminputPassword text-center">Confirm Password</label>
                            </div>
                            <button disabled class="btn btn-lg btn-success text-uppercase" type="submit" style="margin-top:1rem">Reset
                                <i class="fas fa-arrow-right"></i></button>
                        </form>
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