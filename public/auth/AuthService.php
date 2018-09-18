<?php

class AuthService
{
    /**
     * AuthService constructor.
     */
    public function __construct()
    {
    }

    /**
     * Checks if an user is authenticated
     * @param string $location
     */
    public function auth($location)
    {
        $this->destroySessionIfIsExpired();

        //Check if the user is already logged in, if yes then redirect him to welcome page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
            header('location: ' . $location);
            exit;
        }
    }

    /**
     * checks if an user can go to the login page
     */
    public function loginOrRegister()
    {
        $this->destroySessionIfIsExpired();

        //Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: ../../index.php");
            exit;
        }
    }

    /**
     *
     */
    private function destroySessionIfIsExpired()
    {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            // last request was more than 30 minutes ago
            session_unset();     // unset $_SESSION variable for the run-time
            session_destroy();   // destroy session data in storage
        }
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    }
}