<?php

// Initialize the session
session_start();

//Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header('location: /RoutineNotes/public/auth/login.php');
    exit;
}

include_once '../database/dbfunctions.php';

require_once 'templates/head.php';
?>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../public/css/templates/templateStyle.css">

<?php
require_once 'templates/nav-bars.php';
require_once 'body/profileBody.php';
require_once 'templates/loadJs.php';
?>

<?php
require_once 'templates/footer.php';