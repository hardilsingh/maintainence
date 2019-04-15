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
// to check the type of page and change sub-heading
if (isset($_GET['user_type'])) {
    $page_request = $_GET['user_type'];


    switch ($page_request) {
        case 'admin';
            $sub_heading = "Admin";
            $list = Users::adminUsers();
            break;

        case 'customer';
            $sub_heading = "Customer";
            $list = Users::customerUsers();
            break;

        case 'provider';
            $sub_heading = "Service Provider";
            $list = Users::serviceProviderUsers();
            break;
    }
} else {
    $sub_heading = "";
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
                        <h4 class="page-header"> <?php echo $sub_heading ?>
                        </h4>
                    </div>
                    <!--/.col-lg-8 -->
                </div>
                <!-- /.subheading-row -->

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
                                        <th class="col">UserName</th>
                                        <th class="col">Email</th>
                                        <th class="col">Role</th>
                                        <th class="col">Address</th>
                                        <th class="col">Pincode</th>
                                        <th class="col">State</th>
                                        <th class="col">City</th>

                                    </tr>
                                </thead>
                                <!-- /.table head -->
                                <!-- table row -->
                                <?php
                                $i = 1;
                                foreach ($list as $user) {
                                    echo "<td>" . $i++ . "</td>";
                                    echo "<td>$user->username</td>";
                                    echo "<td>$user->user_email</td>";
                                    echo "<td class='text-uppercase'>$user->user_role</td>";
                                    echo "<td><div class='form-group'><textarea disabled class='form-control' rows='3' id='comment'>$user->user_address</textarea></div></td>";
                                    echo "<td>$user->user_pincode</td>";
                                    echo "<td class='text-capitalize'>$user->user_state</td>";
                                    echo "<td class='text-capitalize'>$user->user_city</td>";
                                    echo "</tr>";
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