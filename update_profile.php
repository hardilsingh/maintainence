<?php include("includes/main-rest.php") ?>

<?php

if (!$session->is_signed_in()) {
    redirect('login');
}


?>


<?php

if (isset($_POST['update_profile'])) {
    $name = trim($_POST['name']);
    $ph = trim($_POST['ph']);
    $address = trim($_POST['address']);
    $state = trim($_POST['state']);
    $city = trim($_POST['city']);
    $pincode = trim($_POST['pincode']);
}


?>

<style>
    .form-label-group {
        display: flex;
        align-items: center;
    }
</style>

<body>

    <?php
    $id = $session->user_id;
    $user = Users::find_by_id($id);
    ?>

    <?php

    if (isset($_POST['update_profile'])) {
        $name = trim($_POST['name']);
        $ph = trim($_POST['ph']);
        $address = trim($_POST['address']);
        $state = trim($_POST['state']);
        $city = trim($_POST['city']);
        $pincode = trim($_POST['pincode']);
    }


    ?>
    <div class="container-fluid" role="columnheader">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center display-4" style="margin-top:20px">Complete Your Profile</h1>
                <h6 class="text-center h6" style="margin-top:10px">To access your requests you need to fill in all details in <br> their respective fields.</h6>
            </div>
        </div>


        <div class="col-sm-9 col-md-9 col-lg-8 mx-auto" role="columnheader">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center text-success" role="heading">Personal Info</h5>

                    <form class="form-signin" action="" method="post" role="form">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-label-group">
                                    <input type="email" value="<?php echo $user->name; ?>" role="textbox" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail" role="note">Full Name*</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="number" value="<?php echo $user->user_ph ?>" role="textbox" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Phone Number*</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo $user->user_address ?>" role="textbox" name="confirm_password" id="confirminputPassword" class="form-control" placeholder="Confirm password" required>
                                    <label for="confirminputPassword">Address*</label>
                                </div>
                            </div>


                            <div class="col-lg-4">

                                <div class="form-label-group">
                                    <input type="text" value="<?php echo $user->user_state ?>" role="textbox" name="confirm_password" id="state" class="form-control" placeholder="Confirm password" required>
                                    <label for="state">State*</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" role="textbox" value="<?php echo $user->user_city ?>" name="confirm_password" id="city" class="form-control" placeholder="Confirm password" required>
                                    <label for="city">City*</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="number" role="textbox" value="<?php echo $user->user_pincode ?>" name="confirm_password" id="code" class="form-control" placeholder="Confirm password" required>
                                    <label for="code">Pincode*</label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <?php

                                if ($user->user_role !== 'customer') {



                                    ?>
                                <div class="form-label-group">
                                    <input type="text" role="textbox" name="confirm_password" id="addhar" class="form-control" placeholder="Confirm password" required>
                                    <label for="addhar">Adhaar Number</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" role="textbox" name="confirm_password" id="designation" class="form-control" placeholder="Confirm password" required>
                                    <label for="designation">Designation</label>
                                </div>


                                <?php 
                            } elseif ($user->user_role == 'customer') {

                                ?>
                                <div class="form-label-group">
                                    <input type="text" disabled role="textbox" name="confirm_password" id="addhar" class="form-control" placeholder="Confirm password" required>
                                    <label for="addhar">Adhaar Number</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" disabled role="textbox" name="confirm_password" id="designation" class="form-control" placeholder="Confirm password" required>
                                    <label for="designation">Designation</label>
                                </div>
                                <?php 
                            } ?>
                                <button role="button" class="btn btn-block  btn-success text-uppercase" name="update_profile" type="submit">Update &rarr;</button>

                            </div>

                        </div>


                    </form>
                    <div class="options" role="option">
                        <!-- <a href="" class="signup">Already have an account? Sign in</a> -->
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