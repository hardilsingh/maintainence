<?php include("includes/header.php") ?>

<?php
if (!$session->is_signed_in()) {
    redirect("index");
}
?>


<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <thead>
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


            <?php

            if (isset($_POST['suggestion'])) {
                $searchTxt = $_POST['suggestion'];
                $searchTxt = Requests::searchRequest($searchTxt);


                foreach ($searchTxt as $list) {
                    $i = 1;
                    $services = Services::requestName($list->request_type);
                    echo "<td><input type='checkbox' name='checkAllBoxes[]' class='checkallboxes'></td>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>$services->service_name</td>";
                    echo "<td>$list->user_name</td>";
                    echo "<td>$list->address</td>";
                    echo "<td>$list->user_ph</td>";
                    echo "<td>$list->refrence_id</td>";
                    echo "<td><div class='form-group'><textarea class='form-control' rows='5' id='comment'>$list->msg</textarea></div></td>";
                    echo "<td class='text-uppercase'>$list->request_status</td>";
                    
                    echo "</tr>";
                }
            }

            ?>

        </table>
    </div>
</div>


<?php include("includes/footer.php") ?> 