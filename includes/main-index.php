<?php
ob_start();
require_once("init.php");
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maintenece Services</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- CSS STYLES -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">



    <!-- START OF FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- END OF FONT AWESOME CDN -->

    <!-- START FOR GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:400,800&amp;subset=latin-ext" rel="stylesheet">


    <!-- END OF GOOGLE FONTS -->


    <script src="script.js"></script>
    <script src="jquery.timeago.js"></script>

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