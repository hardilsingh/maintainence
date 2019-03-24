<?php


if (isset($_POST['request'])) {

    $name = $_POST['name'];
    $ph = $_POST['ph'];
    $address = $_POST['address'];
    $service = $_POST['service'];
    $user_msg = $_POST['msg'];
    $user_id = $session->user_id;
    $open = date('d-m-y');


    if ($service !== null) {
        $request = new Requests;

        $request->user_name = $name;
        $request->request_type = $service;
        $request->msg = $user_msg;
        $request->user_ph = $ph;
        $request->address = $address;
        $request->user_id = $user_id;
        $request->refrence_id = uniqid(rand(1, 5, true));
        $request->open = $open;

        $request->create();
        redirect("success");
    } elseif ($service == null) {
        $msg = "<div class='alert alert-danger' role='alert'>Please select you service.</div>";
    }
}

if($session->is_signed_in()) {
    $instant_service = Users::find_by_id($session->user_id);
}
?>



<section class="requests">
    <!-- START OF FORM -->
    <form id="contact" action="" method="post">
        <h4><span>Contact Us</span> for any service</h4>
        <fieldset>
            <input placeholder="Your name" value="<?php if($session->is_signed_in()){echo htmlentities($instant_service->name);} ?>" type="text" tabindex="1" name="name" required autofocus>
        </fieldset>

        <fieldset>
            <input placeholder="Your Phone Number" value="<?php if($session->is_signed_in()){echo htmlentities($instant_service->user_ph);}  ?>" type="tel" name="ph" tabindex="2" required>
        </fieldset>
        <fieldset>
            <input placeholder="Address" value="<?php if($session->is_signed_in()){echo htmlentities($instant_service->user_address);} ?>" type="tel" name="address" tabindex="3" required>
        </fieldset>
        <fieldset>
            <select name="service" tabindex="4" id="" required>

                <option value="" selected> Please select a service. </option>

                <?php

                $list = Services::find_all();

                foreach ($list as $service) {
                    echo "<option value='$service->service_id'>$service->service_name</option>";
                }

                ?>

                <!--  -->
            </select>
        </fieldset>
        <fieldset>
            <textarea placeholder="Type your message here...." tabindex="5" name="msg" required></textarea>
        </fieldset>
        <fieldset>
            <button name="request" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </fieldset>

        <span class="copyright">Having trouble filling the form. Please <a href="#">Contact Us</a></span>
    </form>
    <!-- /END OF FORM -->
</section> 