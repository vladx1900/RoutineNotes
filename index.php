<?php

// Initialize the session
session_start();

//Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header('location: /RoutineNotes/public/auth/login.php');
    exit;
}

include_once 'app/database/dbfunctions.php';

require_once 'app/views/templates/head.php';
?>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./public/css/templates/templateStyle.css">

<?php
require_once 'app/views/templates/nav-bars.php';
require_once 'app/views/templates/body.php';
require_once 'app/views/templates/loadJs.php';
?>

<?php
require_once 'app/views/templates/footer.php';





