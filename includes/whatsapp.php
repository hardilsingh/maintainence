<?php
// Required if your environment does not handle autoloading
require '../vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC615bac9c1bf3c85ca3286129e0d5a186';
$token = '7b65bbb381cc44d56f081e67d90b7301';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+917340910031',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+12027593315',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the bar exam!'
    )
);