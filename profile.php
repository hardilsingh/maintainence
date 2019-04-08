<?php include("includes/main-rest.php") ?>

<?php

if (!$session->is_signed_in()) {
    redirect("login");
}
?>
<?php


$user_profile = Users::find_by_id($session->user_id);


if (isset($_GET['upload_photo'])) {
    if ($image_name !== "") {
        $image_name = $user_profile->user_photo;
        $path = "images/users/$image_name";
        unlink($path);
    }

    $image_tmp = $_FILES['profile_photo']['tmp_name'];
    $temp = explode(".", $_FILES["profile_photo"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $upload_image = Users::updateProfilePhoto($session->user_id, $newfilename);
    move_uploaded_file($image_tmp, "images/users/$newfilename");
    $source = "images/users/$newfilename";
    $destination = "images/users/$newfilename";
    compress($source, $destination, 5);
    redirect("profile");
}


if (isset($_GET['delete_photo'])) {
    $image_name = Users::find_by_id($session->user_id);
    $name = $image_name->user_photo;
    echo $path = "images/users/$name";
    $image = "";
    $image_name = Users::updateProfilePhoto($session->user_id, $image);
    unlink($path);
    redirect("profile");
}


?>




<style>
    label {
        font-weight: bolder;
    }
</style>

<body>
    <div class="container-fluid signup" role="columnheader">


        <!-- START OF NAVIGATION BAR -->
        <?php include("includes/navbar.php") ?>
        <!-- /END OF NAVIGATION BAR -->


        <div class="container main-secction" style="margin-top:50px">
            <div class="row">
                <div class="row user-left-part">
                    <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                        <div class="row ">
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center" style="padding:20px">

                                <form action="profile.php?upload_photo=start" method="post" id="profile" enctype="multipart/form-data">
                                    <?php if ($user_profile->user_photo !== '') {
                                        ?>

                                        <input type="file" name="profile_photo" id="clicktoupload" style="display:none">
                                        <label for="clicktoupload">
                                            <img src="images/users/<?php $user = Users::find_by_id($session->user_id);
                                                                    echo $user->user_photo ?>" class="rounded-circle" style="object-fit:cover">


                                        </label>


                                    <?php
                                } elseif ($user_profile->user_photo == "") {

                                    ?>
                                        <input type="file" name="profile_photo" id="clicktoupload" style="display:none">
                                        <label for="clicktoupload">
                                            <img src="images/dummy.png" class="rounded-circle" style="object-fit:cover">
                                        </label>
                                    <?php
                                } ?>


                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 mx-auto user-detail-section1 text-center">
                                <a href="profile.php?delete_photo" class="btn btn-warning btn-lg" style="margin-top:30px;">Remove Photo</a>
                            </div>
                            </form>

                            <script>
                                $('#clicktoupload').change(function() {
                                    $('#profile').submit();
                                });
                            </script>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section" style="padding:20px;">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left" style="padding:20px">
                                        <h1><?php echo $user_profile->name ?></h1>
                                        <h6 style="color:slategray; margin-top:5px">Active requests: <?php echo Requests::activeRequests($session->user_id) ?></h6>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth" style="padding:20px">
                                        <a href="index.php?request_service=<?php echo $session->user_id ?>" class="btn btn-primary btn-block">Instant service request</a>
                                        <a href="update_profile.php"  class="btn btn-secondary btn-block">Edit Profile</a>
                                        <a href="history.php" class="btn btn-success btn-block">View Requests History</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> User Details</a>
                                            </li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content" style="padding:20px;">
                                            <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><?php echo $user_profile->username ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p><?php echo $user_profile->name ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $user_profile->user_email ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Telephone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $user_profile->user_ph ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $user_profile->user_address ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Plan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Platinum</p> <a href="#">Change Plan</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contact">Contactarme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                        </div>
                        <div class="form-group">
                            <label for="txtFullname">Nombre completo</label>
                            <input type="text" id="txtFullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="txtEmail">Email</label>
                            <input type="text" id="txtEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="txtPhone">Teléfono</label>
                            <input type="text" id="txtPhone" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Guardar</button>
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