<!-- sends data to fetch.php using ajax and recives data -->

<?php include("includes/header.php") ?>

<?php
//to check the login if not signed in send him to index.php to sign in.
if (!$session->is_signed_in()) {
    redirect("index");
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
                        <h1 class="page-header">Search Requests
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- row -->
                <div class="row">
                    <!-- col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="form-group" style='display:flex; padding:50px 20px'>
                            <input type="text" name="search_text" id='search_text' placeholder='Enter Refrence No. or Ph.No' id="" class='form-control'>
                            <input type='submit' class='btn btn-primary' style='margin-left:20px;'>
                        </div>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->

                <!-- row -->
                <div class="row">
                    <!-- col-lg-12 -->
                    <div class="col-lg-12">
                        <div id='result'>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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