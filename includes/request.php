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
        $uniqueid = uniqid(rand(1, 5, true));
        $request->refrence_id =  $uniqueid;
        $request->open = $open;

        $request->create();
        $msg = "Your request has been submitted successfully with refrence id " . $uniqueid . " We will conatct you shortly";
        $number = $ph;
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=207485A7Y9ujYeSFT5ac45f4f&mobiles=$number&message=$msg&sender=CDACGP&route=1&country=91");
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        redirect("success");
    } elseif ($service == null) {
        $msg = "<div class='alert alert-danger' role='alert'>Please select you service.</div>";
    }
}

if ($session->is_signed_in()) {
    $instant_service = Users::find_by_id($session->user_id);
}
?>
<section class="requests">
    <!-- START OF FORM -->
    <form id="contact" action="" method="post">
        <h4><span>Request</span> a service now!</h4>
        <fieldset>
            <input placeholder="Your name" type="text" value="<?php if ($session->is_signed_in()) {
                                                        echo htmlentities($instant_service->name);
                                                    } ?>" type="text" tabindex="1" name="name" required autofocus>
        </fieldset>

        <fieldset>
            <input placeholder="Your Phone Number"  value="<?php if ($session->is_signed_in()) {
                                                                echo htmlentities($instant_service->user_ph);
                                                            }  ?>" type="tel" name="ph" tabindex="2" required>
        </fieldset>
        <fieldset>
            <input placeholder="Address" type="text" value="<?php if ($session->is_signed_in()) {
                                                                echo htmlentities($instant_service->user_address);
                                                            } ?>" type="tel" name="address" tabindex="3" required>
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

        <span class="copyright">Having trouble filling the form. Please <a href="contactus.php">Contact Us</a></span><br><br>
        <span  class="copyright">Keep track of all requests <a href="signup.php" style="font-weight:bolder; font-size:16px">Register Now</a></span>
        
    </form>
    <!-- /END OF FORM -->
</section>