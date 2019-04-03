<?php include("includes/header.php") ?>



<?php
 //start the session to see if the user is logged in already if not the redirect to index to see the page

$user_role = Users::find_by_id($session->user_id);
if (!$session->is_signed_in()) {
    redirect("../login");
}elseif($user_role->user_role !== 'admin') {
    redirect("../profile");
}

    ?>
<!-- body -->

<body>
    <!-- wrapper -->
    <div id="wrapper">

        <!-- top navigation -->
        <?php include("includes/top_navigation.php") ?>
        <!-- /.top navigation -->

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
                        <!-- page header -->
                        <h1 class="page-header">Dashboard
                        </h1>
                        <!-- /.page header -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <!-- row -->
                
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include("includes/footer.php") ?>

</body>

</html>

