<?php
    session_start();
    if(isset($_SESSION["username"])) {
        header("Location: messages.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="top">
            <form action="register.php">
                <input type="submit" value="Register" class="LogintopR">
            </form>
            <form action="login.php">
                <input type="submit" value="Login" class="LogintopL">
            </form>
        </div>
        <form action="verifylogin.php" method="POST">>
            <div class="inputs">
                <input type="text" name="username" class="username" placeholder="Enter username" required> <br>
                <input type="password" name="password" class="passwordL" placeholder="Enter password" required>
            </div>
            <input type="submit" class="submitL" value="Login">
        </form>
        <form action="forgot.php">
            <input type="submit" value="Forgot password?" class="submitForgot">
        </form>
    </div>
</body>
</html>