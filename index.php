<?php

// Initialize the session
session_start();

include_once 'public/auth/AuthService.php';
$authService = new AuthService();
$authService->auth('/RoutineNotes/public/auth/login.php');

include_once 'app/database/dbfunctions.php';

$dbfunctions = new dbfunctions();

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





