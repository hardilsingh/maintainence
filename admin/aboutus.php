<!-- sends data to fetch.php using ajax and recives data -->

<?php include("includes/header.php") ?>

<?php
//to check the login if not signed in send him to index.php to sign in.
if (!$session->is_signed_in()) {
    redirect("../login");
}
?>

<?php

if (isset($_POST['update'])) {
    $p1 = trim($_POST['p1']);
    $p2 = trim($_POST['p2']);
    $p3 = trim($_POST['p3']);

    $update_aboutus = new About;
    $update_aboutus->p1 = $p1;
    $update_aboutus->p2 = $p2;
    $update_aboutus->p3 = $p3;
    $update_aboutus->update(1);
    header("Location:aboutus.php?added=true");
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
                        <h1 class="page-header">Edit about Us.
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
                            <?php  
                            
                                $find_text = About::find_by_id(1);
                            
                            ?>
                                <div class="form-group">
                                    <label for="p1">Paragraph 1: <span class="text-danger">(Note:This para shuld contain maximum and minimum 224 characters!)</span></label>
                                    <textarea maxlength="224" minlength="224" name="p1" id="p1" cols="50" rows="10" value="<?php echo $find_text->p1 ?>"><?php echo $find_text->p1 ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="p2">Paragraph 2: <span class="text-danger">(Note:This para shuld contain maximum and minimum 228 characters!)</span></label>
                                    <textarea maxlength="228" minlength="228" name="p2" id="p2" cols="50" rows="10"value="<?php echo $find_text->p2 ?>"><?php echo $find_text->p2 ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="p3">Paragraph 3: <span class="text-danger">(Note:This para shuld contain maximum and minimum 229 characters!)</span></label>
                                    <textarea maxlength="229" minlength="229" name="p3" id="p3" cols="50" rows="10"value="<?php echo $find_text->p3 ?>"><?php echo $find_text->p3 ?></textarea>
                                </div>

                                <input type="submit" name="update" class="btn btn-lg btn-success" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>

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