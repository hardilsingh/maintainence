<!-- header start -->
<?php include("includes/header.php") ?>
<!-- /.header end -->

<!-- -------------------------------------------------------------------------- -->

<!-- sign in check -->
<?php if (!$session->is_signed_in()) {
    redirect("../login");
} ?>
<!-- /.sign in end -->

<!-- -------------------------------------------------------------------------- -->

<?php

if (isset($_GET['user_role']) && isset($_GET['id'])) {
    $user_id = $_GET['id'];
    Users::changeRole($user_id);
    header("location:create_admin.php?user_role_change=true");
}else {
}

if (isset($_GET['user_role_change']) == true) {
    $msg = '<div class="alert alert-success" role="alert">
        User Role changed successfuly</div>';
}else {
    $msg = "";
}



?>

<!-- ----------------------------------------------------------------------------- -->

<!-- body -->

<body>
    <!-- wrapper -->
    <div id="wrapper">

        <!-- navigation -->
        <?php include("includes/top_navigation.php") ?>
        <!-- /.navigation-->

        <!-- sidebar -->
        <?php include("includes/sidebar.php") ?>
        <!-- /.end of sidebar -->

        <!-- page wrapper -->
        <div id="page-wrapper">

            <!-- container fluid -->
            <div class="container-fluid">

                <!-- heading-row -->
                <div class="row">
                    <!-- col-lg-12 -->
                    <div class="col-lg-12">
                        <h1 class="page-header">Users
                        </h1>
                    </div>
                    <!--/.col-lg-12 -->
                </div>
                <!-- /.heading-row-->

                <!-- subheading-row -->
                <div class="row">
                    <!-- col-lg-8 -->
                    <div class="col-lg-8">
                        <h4 class="page-header"> Search and create admin
                        </h4>
                    </div>
                    <!--/.col-lg-8 -->
                </div>
                <!-- /.subheading-row -->
                <form action="" method="post">
                    <div class="row" style="margin-bottom:30px;">
                        <div class="col-lg-6" style="display:flex">

                            <input type="email" name="mail" id=""  class="form-control">
                            <input type="submit" name='search' value="search" class="btn btn-success" style="margin-left:30px">
                        </div>
                    </div>
                </form>
                <?php echo $msg ?>
                <!-- form -->
                <form action="" method="post">

                    <!-- table-row -->
                    <div class="row">
                        <!-- col-lg-12 -->
                        <div class="col-lg-12 table-responsive">
                            <!-- table -->
                            <table class="table table-hover">
                                <!-- table head -->
                                <thead>
                                    <tr>
                                        <th class="col">#</th>
                                        <th class="col">Email</th>
                                        <th class="col">Role</th>
                                        <th class="col">Address</th>
                                        <th class="col">Pincode</th>
                                        <th class="col">State</th>
                                        <th class="col">City</th>
                                        <th class="col">Action</th>

                                    </tr>
                                </thead>
                                <!-- /.table head -->
                                <!-- table row -->
                                <?php
                                if (isset($_POST['search'])) {
                                    $mail = trim($_POST['mail']);
                                    $search_user = Users::findByEmail($mail);
                                    if ($search_user) {
                                        $i = 1;
                                        echo "<td>" . $i++ . "</td>";
                                        echo "<td>$search_user->user_email</td>";
                                        echo "<td class='text-uppercase'>$search_user->user_role</td>";
                                        echo "<td><div class='form-group'><textarea disabled class='form-control' rows='5' id='comment'>$search_user->user_address</textarea></div></td>";
                                        echo "<td>$search_user->user_pincode</td>";
                                        echo "<td class='text-capitalize'>$search_user->user_state</td>";
                                        echo "<td class='text-capitalize'>$search_user->user_city</td>";
                                        echo "<td class='text-capitalize'><a href='create_admin.php?user_role=admin&id=$search_user->user_id' class='btn btn-lg btn-success'>Admin</td>";
                                        echo "</tr>";
                                    }else {
                                        $msg = '<div class="alert alert-danger" role="alert">
                                        User not found. Please try again</div>';
                                    }
                                }else {
                                }

                                



                                ?>
                                <!-- /.table row -->
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.table-row -->
                </form>
                <!-- /.form -->




            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /page-wrapper -->
    </div>
    <!-- /wrapper -->

    <!-- footer -->
    <?php include("includes/footer.php") ?>
    <!-- /.footer -->

</body>
<!-- /.body -->

</html>
<!-- /.html -->