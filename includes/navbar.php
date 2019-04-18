<?php
if (isset($_GET['logout'])) {
    $session->logout();
    $hour = time() - 3600 * 24 * 30;
    setcookie('email', "", $hour);
    setcookie('password', "", $hour);
    redirect("index");
}
?>


<?php
if ($session->is_signed_in()) {
    $notifications  = Notify::notifyById($session->user_id);
}

?>


<style>
    .notify:focus {
        box-shadow: none !important;
    }

    .bell {
        font-size: 23px;
    }

    .number {
        position: absolute;
        top: -8px;
        right: 18px;
        background: red;
        height: 25px;
        width: 25px;
        border-radius: 50%;
    }

    @media only screen and (min-width:991px) {
        .dropdown-menu {
            position: absolute;
            left: -657%;
            top: 50px;
        }
    }

    @media only screen and (max-width:991px) {
        .dropdown-menu {
            width: 100% !important;
            height: 50% !important;
            
        }

        .dropleft {
            display: flex !important;
            flex-direction: column !important;
        }

        .no-shadow:focus {
            outline: none;
            border: 0;
            box-shadow: 0;
        }


    }
</style>


<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="30px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="diaplay:flex; align-items:flex-start;">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index.php"><i class="fas fa-home" style="margin-right:8px"></i>
                            Home<span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-white" href="membership.php"><i class="fas fa-id-card-alt" style="margin-right:8px"></i>
                            Membership</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="services.php"><i class="fab fa-servicestack" style="margin-right:8px"></i>
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
                    <ul class="navbar-nav ml-auto nav-flex-icons" style="diaplay:flex; align-items:center">

                        <li class=" nav-item display-change">
                            <!-- Default dropleft button -->
                            <div class="btn-group dropleft no-shadow">
                                <button style="background-color:transparent; border:0; outline:none" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <!-- Dropdown menu links -->
                                    <?php foreach ($notifications as $notify) {
                                        echo '
                                        
                                        <div role="alert" aria-live="assertive" style="padding: 10px 20px;" aria-atomic="true" class="toast" data-autohide="false">
                                        <div class="toast-header">
                                        <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                                            <rect fill="#007aff" width="100%" height="100%" /></svg>
                                        <strong class="mr-auto">Status Update</strong>
                                        <small class=""><time class="timeago" datetime="'.$notify->date.'T'.$notify->time.'+5:30">'.$notify->date.'</time></small>
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="toast-body">
                                        ' . $notify->msg . '
                                        </div>
                                    </div>
                                        ';
                                    } ?>
                                </div>
                            </div>

                            <script>
                                jQuery(document).ready(function() {
                                    jQuery("time.timeago").timeago();
                                    jQuery.timeago.settings.allowFuture = true;
                                });
                            </script>


                        </li>




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