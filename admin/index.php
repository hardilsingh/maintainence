<?php include("includes/header.php") ?>

<?php

  if($session->is_signed_in()) {
    redirect("dashboard");
  }
?>

<?php

if (isset($_POST['login'])) {
  $user_email = trim($_POST['email']);
  $user_password = trim($_POST['password']);

  $user_found = Users::verifyUser($user_email, $user_password);


  if ($user_found) {
      $session->login($user_found);
      redirect("dashboard");
  } else {
      $msg = "<div class='alert alert-danger' role='alert'>
      Incorrect Email Id or Password
    </div>";
  }
} else {
  $user_email = "";
  $msg = "";
}

?>



<style>
    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .form-signin {
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 30px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }


    input {
      margin-bottom:1rem;
    }
</style>

<body>

    

    <div class="wrapper">
        <form class="form-signin" method="post" action="">
          <?php echo $msg?>
            <h2 class="form-signin-heading">Admin Login</h2>
            <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo htmlentities($user_email)?>" required autofocus /> <br>
            <input type="password" class="form-control"  name="password" placeholder="Password" required="" />
            
            <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login"><br>

            <a href="cacc.php">Create an admin account</a>
        </form>
    </div>



</body>

</html> 