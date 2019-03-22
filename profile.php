<?php include("includes/main-rest.php") ?>

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
                                <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Update Photo</button>
                                <button class="btn btn-warning btn-block">Remove Photo</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section" style="padding:20px;">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left" style="padding:20px">
                                        <h1>Juan Perez</h1>
                                        <h5>Developer</h5>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                        <a href="/search" class="btn btn-primary btn-block">Request a Service</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
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
                                                        <p>509230671</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>Juan Perez</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>juanp@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Telephone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>12345678</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>662/7 Mehar cahnd road , Gurdaspur</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Plan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Platinum</p> <a href = "#">Change Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Experience</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Expert</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Hourly Rate</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>10$/hr</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Total Projects</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>230</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>English Level</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Expert</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Availability</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>6 months</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Your Bio</label>
                                                        <br />
                                                        <p>Your detail description</p>
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