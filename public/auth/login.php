<?php
include_once '../../app/database/dbfunctions.php';

$dbfunctions = new dbfunctions();

// Initialize the session
session_start();

 //Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if username is empty
    if(isset($_POST["username"]) && !empty(trim($_POST["username"]))){
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(isset($_POST["password"]) && !empty(trim($_POST["password"]))){
        $password = trim($_POST["password"]);
    }

    if (!empty($username) && !empty($password)) {
        $result = $dbfunctions->selectUserByCredentials($username, $password);

        if ($result !== null) {
            $_SESSION["loggedin"] = true;
            $_SESSION["user_email"] = $username;
            header("location: ../../index.php");
            exit;
        } else {
            $wrongCredentials_err = "Invalid username or password";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GYM-log-your-daily-routine</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body>
<form class="form-signin" method="POST" autocomplete="off">
    <h1 class="h3 mb-3 font-weight-normal text-center">Sign in</h1>
    <label for="inputEmail">Email address</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="username" value="">
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" value="">
    <div class="form-group">
        <a href="register.php" style="float: left">Register</a>
        <a href="#" style="float: right">Forgot your password?</a>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    <br>
    <?php if (!empty($wrongCredentials_err)) { ?>
        <span class="form-control alert alert-danger">
        <?= $wrongCredentials_err ?>
    </span>
    <?php } ?>

</form>
</body>
</html>
