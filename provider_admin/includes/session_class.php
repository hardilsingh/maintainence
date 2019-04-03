<?php


//methods and properties to deal with sessions login and logout
class Sessions
{

    //properties
    private $signed_in = false;
    public $user_id;

    //constructor to start the session automatically
    function __construct()
    {
        session_start();
        $this->check_the_login();
    }

    //check if the user is signed in or not
    public function is_signed_in()
    {
        return $this->signed_in;
    }

    //to login the user and start his private session
    public function login($user)
    {
        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user->user_id;
            $this->signed_in = true;
        }
    }

    //to logout the user and suspend his private session
    public function logout()
    {
        unset($this->user_id);
        unset($_SESSION['user_id']);
        $this->signed_in = false;
    }

    //to chheck the login to see if the user is already logged in
    private function check_the_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}

//instance of session class started
$session = new Sessions();
