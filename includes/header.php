<?php

if (isset($_GET['logout_user'])) {
    $session->logout();
    redirect("index");
}

if(isset($_GET['logout'])) {
    $session->logout();
    redirect("login");
}

?>

<header class="header">
    <div class="cta-1">
        <img src="images/logo.png" alt="logo" class="logo">
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
        <span class='log__in'><a href='profile.php'><i class='fas fa-user-alt'></i>View Profile</a></span>
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
        <a href="#" class="btn__link"><span>Discover</span> services</a>
    </div>
</header> 