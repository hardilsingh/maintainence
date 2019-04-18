<!-- sends data to fetch.php using ajax and recives data -->

<?php include("includes/header.php") ?>

<?php
//to check the login if not signed in send him to index.php to sign in.
if (!$session->is_signed_in()) {
    redirect("../login");
}
?>

<?php

if (isset($_POST['add_member'])) {
    $name = trim($_POST['name']);
    $desig = trim($_POST['desig']);

    $img = $_FILES['member_image']['name'];
    $tmp_img = $_FILES['member_image']['tmp_name'];

    $add_dev_team = new Dev_team;
    $add_dev_team->name = $name;
    $add_dev_team->img = $img;
    $add_dev_team->desig = $desig;
    $add_dev_team->create();

    move_uploaded_file($tmp_img, "../images/dev_team/$img");
    header("Location:dev_team.php?added=true");
} else {
    $msg = "";
}


if (isset($_GET['added']) == true) {
    $msg = '<div class="alert alert-success" role="alert">
        Service Member added succesfully</div>';
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
                        <h1 class="page-header">Add/Remove Development Team.
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
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" required name="name" id="name">
                                </div>

                                <div class="form-group">
                                    <label for="desig">Designation</label>
                                    <input type="text" class="form-control" required name="desig" id="desig">
                                </div>




                                <div class="form-group">
                                    <label for="service_image">Member Photo:</label>
                                    <input type="file" class="form-control" required name="member_image" id="service_image">
                                </div>

                                <input type="submit" name="add_member" class="btn btn-lg btn-success" value="Add member">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12">
                    <div class="row" style="padding:30px 0px;">
                        <h1 class="display-4" style="font-size:35px">Current members</h1>
                    </div>
                </div>
                <div class="col-lg-8" style="margin-top:30px">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Desig</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $dev_list = Dev_team::find_all();
                            $i = 1;
                            foreach ($dev_list as $member) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>$member->name</td>";
                                echo "<td><img src='../images/dev_team/" . $member->img . "' height='100px' width='100px' style='object-fit:cover'></td>";
                                echo "<td class='text-capitalize'>$member->desig</td>";

                                echo "<td><a class='btn btn-danger' href='team.php?delete=true&id=$member->id'>Remove</a></td>";
                                echo "<td><a class='btn btn-primary' href='team.php?edit=true&id=$member->id'>Edit</a></td>";
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