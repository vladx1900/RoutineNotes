<?php
include_once '../../app/database/dbfunctions.php';

$dbfunctions = new dbfunctions();

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    }

    if (isset($_POST['password'], $_POST['repeatPassword']) && !empty($_POST['password']) && !empty($_POST['repeatPassword']) && trim($_POST['password']) === trim($_POST['repeatPassword'])) {
        $password = $_POST['password'];
    } else {
        $error = 'Password and repeat password not match!';
    }

    if (!empty($username) && !empty($password)) {
        $searchForUserWithThisEmail = $dbfunctions->selectUserByEmail($username);

        if (empty($searchForUserWithThisEmail)) {
            $result = $dbfunctions->insertNewUser($username, $password);
        } else {
            $error = 'This email is already used!';
        }

        if (empty($error) && $result) {
            $_SESSION["loggedin"] = true;
            $_SESSION["user_email"] = $username;
            header("location: ../../index.php");
        } else if (empty($error))  {
            $error = 'Could not create the user';
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
    <h1 class="h3 mb-3 font-weight-normal text-center">Sign up</h1>
    <label for="inputEmail">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="username" value="">
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" value="">
    <label for="inputPassword">Repeat password</label>
    <input type="password" id="inputPasswordRepeat" class="form-control" placeholder="Repeat Password" required name="repeatPassword" value="">
    <a href="login.php" style="float: right">Already have an account?</a>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <br>
    <?php if (!empty($error)) { ?>
        <span class="form-control alert alert-danger">
        <?= $error ?>
    </span>
    <?php } ?>

</form>
</body>
</html>