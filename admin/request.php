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
if (isset($_GET['type'])) {
    $page_request = $_GET['type'];


    switch ($page_request) {
        case 'pending_requests';
            $sub_heading = "New Requests";
            $list = Requests::pendingRequests();
            break;

        case 'in_process';
            $sub_heading = "In Process";
            $list = Requests::inProcess();
            break;

        case 'completed';
            $sub_heading = "Completed Requests";
            $list = Requests::completed();
            break;

        case 'cancelled';
            $sub_heading = "Cancelled Requests";
            $list = Requests::cancelled();
            break;
    }
} else {
    $sub_heading = "";
}

?>

<!-- ----------------------------------------------------------------------------- -->

<?php
//to change the request status in bulk
if (isset($_POST['apply'])) {
    $actions = $_POST['action'];
    $checkAllBoxes = $_POST['checkAllBoxes'];

    foreach ($checkAllBoxes as $id) {
        switch ($actions) {

            case 'completed';
                $status = Requests::updateStatus($actions, $id);
                header("Location:request.php?type=completed");
                break;

            case 'in_process';
                $status = Requests::updateStatus($actions, $id);
                header("Location:request.php?type=in_process");
                break;
        }
    }
}
?>

<!-- ------------------------------------------------------------------------------ -->

<?php
//to update status of a request one at a time
if (isset($_GET['update_status']) && isset($_GET['request_id'])) {
    $status = $_GET['update_status'];
    $id = $_GET['request_id'];

    Requests::updateStatus($status, $id);
    header("location:request.php?type=$status");
}
?>

<!-- ------------------------------------------------------------------------------ -->

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
                        <h1 class="page-header">Service Requests
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
                    <!-- form-row -->
                    <div class="row">
                        <!-- col-lg-5 -->
                        <div class="col-lg-5">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name='action'>
                                    <option value="">Select action</option>
                                    <option value="completed">Completed</option>
                                    <option value="in_process">In Process</option>

                                </select>
                            </div>
                        </div>
                        <!-- /.col-lg-5 -->
                        <div class="col-lg-2">
                            <button class="btn btn-primary" type='submit' name='apply'>Apply</button>
                        </div>
                    </div>
                    <!-- form-row -->

                    <!-- table-row -->
                    <div class="row">
                        <!-- col-lg-12 -->
                        <div class="col-lg-12 table-responsive">
                            <!-- table -->
                            <table class="table  table-hover">
                                <!-- table head -->
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="col"><input type="checkbox" class="checkAll"></th>
                                        <th class="col">#</th>
                                        <th class="col">Request Type</th>
                                        <th class="col">Name</th>
                                        <th class="col">Address</th>
                                        <th class="col">Ph. No</th>
                                        <th class="col">Refrence Id</th>
                                        <th class="col">View Request</th>
                                        <th class="col">Update Status</th>
                                        <th class="col"></th>
                                    </tr>
                                </thead>
                                <!-- /.table head -->
                                <!-- table row -->
                                <?php
                                $i = 1;
                                foreach ($list as $request) {
                                    $services = Services::requestName($request->request_type);
                                    echo "<td><input type='checkbox' value='$request->request_id'  name='checkAllBoxes[]' class='checkallboxes'></td>";
                                    echo "<td>" . $i++ . "</td>";
                                    echo "<td>$services->service_name</td>";
                                    echo "<td>$request->user_name</td>";
                                    echo "<td>$request->address</td>";
                                    echo "<td>$request->user_ph</td>";
                                    echo "<td>$request->refrence_id</td>";
                                    echo "<td><div class='form-group'><textarea disabled class='form-control' rows='5' id='comment'>$request->msg</textarea></div></td>";
                                    if (isset($_GET['type'])) {
                                        $type = $_GET['type'];

                                        switch ($type) {
                                            case 'pending_requests';
                                                echo "<td><a href='request.php?type=in_process&update_status=in_process&request_id=$request->request_id' class='btn btn-primary'>In Process</a></td>";
                                                break;

                                            case 'in_process';
                                                echo "<td><a href='request.php?type=completed&update_status=completed&request_id=$request->request_id' class='btn btn-success'>Completed</a></td>";
                                                break;

                                            case 'completed';
                                                echo "<td>Success</td>";
                                                break;
                                        }
                                    }
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