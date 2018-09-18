<?php

// Initialize the session
session_start();

include_once '../../../public/auth/AuthService.php';
$authService = new AuthService();
$authService->auth('/RoutineNotes/public/auth/login.php');

include_once '../../database/dbfunctions.php';
$dbfunctions = new dbfunctions();

require_once '../templates/head.php';
?>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../../public/css/templates/templateStyle.css">

<?php
require_once '../templates/nav-bars.php';
require_once '../body/exerciseTemplateBody.php';
require_once '../templates/loadJs.php';
?>

<?php
require_once '../templates/footer.php';