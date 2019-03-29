<?php
if (isset($_GET['logout'])) {
    $session->logout();
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
                        <a class="nav-link text-white" href="membership.php"><i class="fab fa-servicestack" style="margin-right:8px"></i>
                            Services</a>
                    </li>

                    <?php
                    if (!$session->is_signed_in()) {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="signup.php"><i class="fas fa-user-plus" style="margin-right:8px"></i>
                            Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php"><i class="fas fa-sign-in-alt" style="margin-right:8px"></i>
                            Log in</a>
                    </li>
                    <?php

                }
                ?>


                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <?php
                    if ($session->is_signed_in()) {
                        ?>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?logout=true"><i class="fas fa-sign-out-alt"></i></i>
                            Logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php"><i class="fas fa-user-alt"></i>
                            <a class="navbar-brand" href="#"><img src="images/dummy.jpg" height="30px" width="30px" style="border-radius:50%; object-fit:cover"></a>
                        </a>
                    </li>
                    <?php 
                } ?>
                </ul>

            </div>

        </nav>
    </div>

</div> 