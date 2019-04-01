<?php include("includes/main-rest.php") ?>

<?php

if (!$session->is_signed_in()) {
    redirect("login");
}
?>
<?php

if (isset($_GET['request_status']) && isset($_GET['id'])) {
    $request_id = $_GET['id'];
    $status = $_GET['request_status'];
    Requests::updateStatus($status, $request_id);
    header("Location:profile.php?update_status=success");
}

if (isset($_GET['update_status'])) {
    $msg = "<div class='alert alert-success' role='alert'>Your request has been cancelled successfully</div>";
} else {
    $msg = "";
}


if (isset($_POST['upload_photo'])) {
    $image_tmp = $_FILES['profile_image']['tmp_name'];
    $image = $_FILES['profile_image']['name'];

    if ($image !== "") {
        $upload_image = Users::updateProfilePhoto($session->user_id, $image);
        move_uploaded_file($image_tmp, "images/users/$image");
    } else {
        $msg = "<div class='alert alert-warning' role='alert'>
        Please select a photo to upload.
    </div>";
    }
} else {
    $msg = "";
}


?>


<?php
$user_profile = Users::find_by_id($session->user_id);
?>

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

                                <?php if ($user_profile->user_photo !== '') {
                                    ?>

                                <img src="images/users/<?php $user = Users::find_by_id($session->user_id);
                                                        echo $user->user_photo ?>" class="rounded-circle" style="object-fit:cover">
                                <?php 
                            } else {

                                ?>

                                <img src="images/users/dummy.jpg" class="rounded-circle" style="object-fit:cover">

                                <?php 
                            } ?>

                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                    <input type="file" name="profile_image">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                    <button name="upload_photo" class="btn btn-success btn-block follow" style="margin-right:20px">Update Photo</button>
                                    <button class="btn btn-warning btn-block" style="margin-right:20px">Remove Photo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section" style="padding:20px;">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left" style="padding:20px">
                                        <h1><?php echo $user_profile->name ?></h1>
                                        <h5 id="success_msg" style="margin-top:10px"><?php echo $msg ?></h5>
                                        <script>
                                            setTimeout(() => {
                                                document.getElementById("success_msg").style.display = "none";
                                            }, 3000);
                                        </script>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                        <a href="index.php?request_service=<?php echo $session->user_id ?>" class="btn btn-primary btn-block">Instant Request Service</a>
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
                                            <li class="nav-item">
                                                <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Services Requested History</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content" style="padding:20px;">
                                            <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Username</label>
                                                    </div>
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
                                            <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                <div class="row">
                                                    <div class="col-lg-12 table-responsive">
                                                        <!-- table -->
                                                        <table class="table  table-hover">
                                                            <!-- table head -->
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Request</th>
                                                                    <th>Refrence Id</th>
                                                                    <th>Status</th>
                                                                    <th>Opened on</th>
                                                                    <th>Closed on</th>
                                                                    <th></th>
                                                                    <th></th>

                                                                </tr>
                                                            </thead>
                                                            <!-- /.table head -->
                                                            <?php
                                                            $user_id = $session->user_id;
                                                            $foundHistory = Requests::requestHistory($user_id);
                                                            $i = 1;
                                                            foreach ($foundHistory as $historyItem) {
                                                                $services = Services::requestName($historyItem->request_type);
                                                                echo "<tr>";
                                                                echo "<td>" . $i++ . "</td>";
                                                                echo "<td>$services->service_name</td>";
                                                                echo "<td>$historyItem->refrence_id</td>";
                                                                echo "<td class='text-uppercase'>$historyItem->request_status</td>";
                                                                echo "<td>$historyItem->open</td>";
                                                                echo "<td>$historyItem->closed</td>";
                                                                if ($historyItem->request_status !== 'completed' && $historyItem->request_status !== 'cancelled') {
                                                                    echo "<td><a href='profile.php?request_status=cancelled&id=$historyItem->request_id' class='btn btn-danger'>Cancel</a></td>";
                                                                }
                                                                echo "</tr>";
                                                            }
                                                            ?>

                                                        </table>
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