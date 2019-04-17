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
    $name = trim($_POST['member_name']);
    $service_given = trim($_POST['service_given']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    $img = $_FILES['member_image']['name'];
    $tmp_img = $_FILES['member_image']['tmp_name'];

    $add_member = new Team;
    $add_member->name = $name;
    $add_member->image = $img;
    $add_member->service_given = $service_given;
    $add_member->first_name = $first_name;
    $add_member->last_name = $last_name;
    $add_member->create();
    move_uploaded_file($tmp_img, "../images/service_members/$img");
    header("Location:team.php?added=true");
} else {
    $msg = "";
}


if (isset($_GET['added']) == true) {
    $msg = '<div class="alert alert-success" role="alert">
        Service Member added succesfully</div>';
}


if(isset($_GET['delete']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    Team::deletemember($id);
    header("location:team.php");
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
                        <h1 class="page-header">Add/Remove Team members.
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
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" required name="first_name" id="firstname">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" required name="last_name" id="lastname">
                                </div>

                                <div class="form-group">
                                <label for="service_name">Type of service:</label>

                                    <select name="service_given" class="form-control" tabindex="4" id="" required>

                                        <option value="" selected> Please select a service. </option>

                                        <?php

                                        $list = Services::find_all();

                                        foreach ($list as $service) {
                                            echo "<option value='$service->service_id'>$service->service_name</option>";
                                        }

                                        ?>

                                        <!--  -->
                                    </select>
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
                                <th>Service Provided</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $member_list = Team::find_all();
                            $i = 1;
                            foreach ($member_list as $member) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>$member->first_name $member->last_name</td>";
                                echo "<td><img src='../images/service_members/" . $member->image . "' height='100px' width='100px' style='object-fit:cover'></td>";
                                $service = Services::requestName($member->service_given);
                                echo "<td class='text-capitalize'>$service->service_name</td>";
                                
                                echo "<td><a class='btn btn-danger' href='team.php?delete=true&id=$member->team_id'>Remove</a></td>";
                                echo "<td><a class='btn btn-primary' href='team.php?edit=true&id=$member->team_id'>Edit</a></td>";
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