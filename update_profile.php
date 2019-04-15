<?php include("includes/main-rest.php") ?>

<?php

if (!$session->is_signed_in()) {
    redirect('login');
}

if (isset($_GET['update_profile'])) {
    $msg = "<div class='alert alert-success' role='alert'>Profile updated successfully <a href='profile.php' style='margin-left:10px' class='btn btn-success'>Go to profile</a></div>";
} else {
    $msg = "";
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


        $updated_information = new Users;
        $updated_information->name = $name;
        $updated_information->user_email = $user->user_email;
        $updated_information->user_password = $user->user_password;
        $updated_information->user_role = $user->user_role;
        $updated_information->user_state = $state;
        $updated_information->user_address = $address;
        $updated_information->user_city = $city;
        $updated_information->user_pincode = $pincode;
        $updated_information->user_ph = $ph;
        $updated_information->user_photo = $user->user_photo;

        $updated_information->update($session->user_id);
        header("Location:update_profile.php?update_profile=success");
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
                    <h5 class="card-title text-center text-success" style="margin-bottom:5px" role="heading">Personal Info</h5>
                    <?php echo $msg  ?>
                    <form class="form-signin" action="" method="post" role="form">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-label-group">
                                    <input type="text" value="<?php echo $user->name; ?>" role="textbox" name="name" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail" role="note">Full Name*</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="tel" maxlength="10" minlength="10"  name="ph" value="<?php echo $user->user_ph ?>" role="textbox" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Phone Number*</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="address" value="<?php echo $user->user_address ?>" role="textbox" name="confirm_password" id="confirminputPassword" class="form-control" placeholder="Confirm password" required>
                                    <label for="confirminputPassword">Address*</label>
                                </div>
                            </div>


                            <div class="col-lg-4">

                                <div class="form-label-group">
                                    <input type="text" name="state" value="<?php echo $user->user_state ?>" role="textbox" name="confirm_password" id="state" class="form-control" placeholder="Confirm password" required>
                                    <label for="state">State*</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="city" role="textbox" value="<?php echo $user->user_city ?>" name="confirm_password" id="city" class="form-control" placeholder="Confirm password" required>
                                    <label for="city">City*</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="number" name="pincode" role="textbox" value="<?php echo $user->user_pincode ?>" name="confirm_password" id="code" class="form-control" placeholder="Confirm password" required>
                                    <label for="code">Pincode*</label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <?php

                                if ($user->user_role !== 'customer') {



                                    ?>
                                <div class="form-label-group">
                                    <input type="text" name="addhar" role="textbox" name="confirm_password" id="addhar" class="form-control" placeholder="Confirm password">
                                    <label for="addhar">Adhaar Number</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="desig" role="textbox" name="confirm_password" id="designation" class="form-control" placeholder="Confirm password">
                                    <label for="designation">Designation</label>
                                </div>


                                <?php 
                            } elseif ($user->user_role == 'customer') {

                                ?>
                                <div class="form-label-group">
                                    <input type="text" disabled role="textbox" name="confirm_password" id="addhar" class="form-control" placeholder="Confirm password">
                                    <label for="addhar">Adhaar Number</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" disabled role="textbox" name="confirm_password" id="designation" class="form-control" placeholder="Confirm password">
                                    <label for="designation">Designation</label>
                                </div>
                                <?php 
                            } ?>
                                <input role="button" class="btn btn-block  btn-success text-uppercase" name="update_profile" value="Update &rarr;" type="submit">

                            </div>

                        </div>


                    </form>
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