<?php include("includes/header.php") ?>

<?php
if (!$session->is_signed_in()) {
    redirect("index");
}
?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/top_navigation.php") ?>
        <!-- /.navbar-top-links -->

        <?php include("includes/sidebar.php") ?>



        <div id="page-wrapper">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Search Requests
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group" style='display:flex; padding:50px 20px'>
                            <input type="text" name="search_text" id='search_text' placeholder='Enter Refrence No. or Ph.No' id="" class='form-control'>
                            <input type='submit' class='btn btn-primary' style='margin-left:20px;'>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div id='result'>

                        </div>
                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->
    <?php include("includes/footer.php") ?>



</body>

</html> 