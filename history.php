<!-- main-rest -->
<?php include("includes/main-rest.php") ?>
<!-- /.main-rest -->

<!-- body -->

<?php


if (isset($_GET['request_status']) && isset($_GET['id'])) {
    $request_id = $_GET['id'];
    $status = $_GET['request_status'];
    Requests::updateStatus($status, $request_id);
    header("Location:history.php");
}


if (isset($_GET['update_status'])) {
    $msg = "<div class='alert alert-success' role='alert'>Your request has been cancelled successfully</div>";
} else {
    $msg = "";
}

$msg = ""


?>

<body>
    <!-- container-fluid -->
    <div class="container-fluid" role="columnheader">

        <!-- navigation -->
        <?php include("includes/navbar.php") ?>
        <!-- /.navigation -->


        <!-- heading row -->
        <div class="row" role="row">
            <!-- col-lg-12 -->
            <div class="col-lg-12" role="columnheader">
                <h1 class="display-4 text-center" role="heading" style="margin-bottom:3rem; margin-top: 2rem"><i class="fas fa-history" style="color:green; margin-right: 1.5rem"></i>Requests History<span style="color: green !important">.</span>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.heading row -->



        <div class="col-sm-9 col-md-9 col-lg-8 mx-auto table-responsive" role="columnheader">
            <table class="table">
                <thead class="thead-dark table-hover">
                    <tr>
                        <th scope="">#</th>
                        <th scope="">Request Name</th>
                        <th scope="">Refrence Id</th>
                        <th scope="">Opened on</th>
                        <th scope="">Closed on</th>
                        <th scope="">Status</th>
                        <th scope="">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php

                    $history = Requests::requestHistory($session->user_id);
                    $i = 1;
                    foreach ($history as $history_entry) {
                        $service_name = Services::requestName($history_entry->request_type);
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td class='text-capitalize'>$service_name->service_name</td>";
                        echo "<td>$history_entry->refrence_id</td>";
                        echo "<td>$history_entry->open</td>";
                        echo "<td>$history_entry->closed</td>";
                        echo "<td class='text-uppercase text-danger'>$history_entry->request_status</td>";
                        if ($history_entry->request_status == "pending" || $history_entry->request_status == "in_process") {
                            echo "<td><a href='history.php?request_status=cancelled&id=$history_entry->request_id' class='btn btn-lg btn-warning' onlcick='confirm'>Cancel</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

        <div class="container-fluid">
            <!-- footer row -->
            <div class="row" role="row">
                <!-- col-lg-12 -->
                <div class="col-lg-12" role="columnheader">
                    <!-- footer -->
                    <?php include("includes/footer.php") ?>
                    <!-- /.footer-->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.footer row -->
        </div>
    </div>
</body>
<!-- /.body -->

</html>