<!-- sends data to fetch.php using ajax and recives data -->

<?php include("includes/header.php") ?>

<?php
//to check the login if not signed in send him to index.php to sign in.
if (!$session->is_signed_in()) {
    redirect("../login");
}
?>

<?php

if (isset($_POST['add_service'])) {
    $name = trim($_POST['service_name']);
    $text = trim($_POST['text']);

    $img = $_FILES['service_image']['name'];
    $tmp_img = $_FILES['service_image']['tmp_name'];

    $add_service = new Services;
    $add_service->service_name = $name;
    $add_service->text = $text;
    $add_service->image = $img;
    $add_service->create();
    if(!move_uploaded_file($tmp_img,"../images/service/$img")) {
        die();
    }
    header("Location:service_add.php?added=true");
} else {
    $msg = "";
}


if (isset($_GET['added']) == true) {
    $msg = '<div class="alert alert-success" role="alert">
        Service added succesfully</div>';
}


?>



<body>
    <!-- wrapper -->
    <div id="wrapper">

        <!-- top navigation -->
        <?php include("includes/top_navigation.php") ?>
        <!-- /.navbar-top-links -->

        <!-- sidebar -->
        <?php include("includes/sidebar.php") ?>
        <!-- /.sidebar -->

        <!-- page wrapper -->
        <div id="page-wrapper">
            <!-- conatiner fluid -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <!-- col-lg-12 -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Add new Services
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="col-lg-12">
                    <div class="row">
                        <h1 class="display-4" style="font-size:35px">Enter the following details</h1>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo $msg ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="service_name">Service name:</label>
                                    <input type="text" class="form-control" required name="service_name" id="service_name">
                                </div>

                                <div class="form-group">
                                    <label for="service_text">Service Text: <span class="text-danger">(Note:Please enter min 110 characters and max 140 characters.)</span></label>
                                    <textarea type="text" maxlength="140" minlength="110" class="form-control" required rows="5" name="text" id="service_text"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="service_image">Service Image:</label>
                                    <input type="file" class="form-control" required name="service_image" id="service_image">
                                </div>

                                <input type="submit" name="add_service" class="btn btn-lg btn-success" value="Add service">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    <div class="row" style="padding:30px 0px;">
                        <h1 class="display-4" style="font-size:35px">Current services</h1>
                    </div>
                </div>
                <div class="col-lg-8" style="margin-top:30px">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Service Name</th>
                                <th>Text</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $service_list = Services::find_all();
                            $i = 1;
                            foreach ($service_list as $service) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>$service->service_name</td>";
                                echo "<td>$service->text</td>";
                                echo "</tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- footer -->
    <?php include("includes/footer.php") ?>
    <!-- /.footer -->


</body>
<!-- /.body -->

</html>
<!-- /.html -->