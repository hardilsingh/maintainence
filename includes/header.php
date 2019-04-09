<?php

if (isset($_GET['logout']) == true) {
    $session->logout();
    $hour = time() - 3600 * 24 * 30;
    setcookie('email', "", $hour);
    setcookie('password', "", $hour);
    redirect("login");
}




?>


<style>
    i {
        color:green;
        margin-right:1rem;
    }
</style>

<header class="header">
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active"><img src="images/logo.png" alt="logo" class="logo"> </a>

        <a href="membership.php"><i class="fas fa-paperclip"></i> Membership Plans</a>
        <a href="contactus.php"><i class="fas fa-phone"></i> Contact Us</a>
        <a href="about.php"><i class="fas fa-address-card"></i> About us</a>

        <?php

        if (!$session->is_signed_in()) { 

        ?>

        <a href="login.php" class="last"><i class='fas fa-user-alt'></i>Login</a>
        <?php }else {?>
        <a href="index.php?logout=true">Logout</a>
        <?php 
        $user = Users::find_by_id($session->user_id);
        if ($user->user_photo !==  "") {
            ?>
        <a href='profile.php'><img src="images/users/<?php echo $user->user_photo ?>" height="40px" width="40px" style="border-radius:50%; object-fit:cover"></a>
        <?php 
    } elseif($user->user_photo == "") {
        ?>
        <a href='profile.php'><img src="images/dummy.png" height="40px" width="40px" style="border-radius:50%; object-fit:cover"></a>
        <?php 
    }



    ?>

<?php }?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars" height="2rem"></i>
        </a>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <div class="cta-1">
        <a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a>
        <span class="contact__us"><a href="membership.php"><i class="fas fa-paperclip"></i>Membership plans</a></span>
        <span class="contact__us"><a href="contactus.php"><i class="fas fa-phone"></i>Contact Us</a></span>

        <?php

        if (!$session->is_signed_in()) {

            ?>

        <span class='sign__up'><a href='signup.php'><i class='fas fa-user-plus'></i> Sign Up</a></span>
        <span class='log__in'><a href='login.php'><i class='fas fa-user-alt'></i>Log in</a></span>
        <?php

    } else {
        ?>

        <span class='sign__up'><a href='index.php?logout=true'><i class='fas fa-user-plus'></i> Logout</a></span>

        <?php 
        $user = Users::find_by_id($session->user_id);
        if ($user->user_photo !==  "") {
            ?>
        <span class='log__in' style="margin-left:20px"><a href='profile.php'><img src="images/users/<?php echo $user->user_photo ?>" height="40px" width="40px" style="border-radius:50%; object-fit:cover"></a></span>
        <?php 
    } else {
        ?>
        <span class='log__in' style="margin-left:20px"><a href='profile.php'><img src="images/dummy.png" height="40px" width="40px" style="border-radius:50%; object-fit:cover"></a></span>
        <?php 
    }



    ?>

        <?php

    }

    ?>
    </div>

    <div class="moto">
        <span class="moto__heading">Maintainence</span>
        <span class="moto__heading">At Your</span>
        <span class="moto__heading">Doorstep<span style="color: #43A047">.</span></span>
    </div>

    <div class="btn">
        <a href="services.php" class="btn__link"><span>Discover</span> services</a>
    </div>
</header>


<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $user_found = Users::verifyUser($_COOKIE['email']);

    if ($user_found->user_role == 'customer') {
        //start session
        $session->login($user_found);
        //send to profile
    } elseif ($user_found->user_role == 'admin') {
        //start session
        $session->login($user_found);
        //send to profile
    }
} //rememberme is on
?> 