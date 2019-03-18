

<?php

    if(isset($_GET['logout_user'])) {
        $session->logout();
        redirect("index");
    }

?>

<header class="header">
    <div class="cta-1">
        <img src="images/logo.png" alt="logo" class="logo">
        <span class="contact__us"><a href="membership.php"><i class="fas fa-paperclip"></i>Membership plans</a></span>
        <span class="contact__us"><a href="contactus.php"><i class="fas fa-phone"></i>Contact Us</a></span>




        <?php if(!$session->is_signed_in()) {
             echo "<span class='sign__up'><a href='signup.php'><i class='fas fa-user-plus'></i> Sign Up</a></span>";
             echo "<span class='log__in'><a href='login.php'><i class='fas fa-user-alt'></i>Log in</a></span>";
        }else {
            echo "<span class='sign__up'><a href='profile.php'><img src='images/p1.jpg' height='40px' width='40px' style='border-radius:50%; object-fit:cover; border: 3px solid green'></a></span>";
            echo "<span class='log__in'><a href='index.php?logout_user=true'><i class='fas fa-user-alt'></i>Log out</a></span>";
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