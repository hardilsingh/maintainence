<?php
if (isset($_GET['logout'])) {
    $session->logout();
    $hour = time() - 3600 * 24 * 30;
        setcookie('email', "", $hour);
        setcookie('password', "", $hour);
    redirect("index");
}
?>


<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand" href="#"><img src="images/logo.png" height="30px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index.php"><i class="fas fa-home" style="margin-right:8px"></i>
                            Home<span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-white" href="membership.php"><i class="fas fa-id-card-alt" style="margin-right:8px"></i>
                            Membership</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php#services_section"><i class="fab fa-servicestack" style="margin-right:8px"></i>
                            Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contactus.php"><i class="fas fa-id-badge" style="margin-right:8px"></i>
                            Contact us</a>
                    </li>

                </ul>

                <?php
                if (!$session->is_signed_in()) {
                    ?>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="signup.php"><i class="fas fa-user-plus" style="margin-right:8px"></i>
                            Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php"><i class="fas fa-sign-in-alt" style="margin-right:8px"></i>
                            Log in</a>
                    </li>
                </ul>
                <?php

            }
            ?>



                <?php
                if ($session->is_signed_in()) {
                    ?>
                <ul class="navbar-nav ml-auto nav-flex-icons">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php?logout=true"><i class="fas fa-sign-out-alt"></i></i>
                            Logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php">
                            <?php 
                            $user = Users::find_by_id($session->user_id);

                            if ($user->user_photo !== "") {

                                ?>
                            <img src="images/users/<?php echo $user->user_photo ?>" height="30px" width="30px" style="border-radius:50%; object-fit:cover;border:2px solid white">

                            <?php 
                        } else {
                            ?>

                            <img src="images/dummy.png" class="rounded-circle" height="30px" width="30px" style="border-radius:50%; object-fit:cover;border:2px solid white"">


                            <?php 
                        } ?>

                        </a>
                    </li>
                </ul>
                <?php 
            } ?>


            </div>

        </nav>
    </div>

</div> 