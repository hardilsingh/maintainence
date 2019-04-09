<?php
ob_start();
require_once("init.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maintainence Services</title>
    <link rel="shortcut icon" href="images/favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="sliding.form.js"></script>
    <!-- START OF FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- END OF FONT AWESOME CDN -->

    <!-- START FOR GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:400,800&amp;subset=latin-ext" rel="stylesheet">
</head>

<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $user_found = Users::verifyUser($_COOKIE['email']);

    if ($user_found->user_role == 'customer') {
        //start session
        $session->login($user_found);
        //send to profile
    } elseif ($user_found->user_role == 'admin') {
        //start session
        $session->login($user_found);
        //send to profile
    }
} //rememberme is on
?> 