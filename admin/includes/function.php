<?php include("init.php") ?>

<?php

//used to redirect user to a different page instead of using header function each time
function redirect($filename)
{
    header("Location:" . $filename . ".php");
}

function createRandomPassword()
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
    $i = 0;
    $pass = '';

    while ($i <= 7) {
        $num = mt_rand(0, 61);
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}


function encryptor($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'hsdbvkufavbsfkjhvk.jfvkuhasfkjbvakjfhvkjadfvkugadfvkbskjafhvkuafhvkbafuvoh';
    $secret_iv = 'skdjjgvukrdkjuoyrghkldahgudhgkhriuygiufhkjgheo';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

