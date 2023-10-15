<?php
    session_start();
    if(isset($_SESSION["username"])) {
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="top">
            <form action="register.php">
                <input type="submit" value="Register" class="topR">
            </form>
            <form action="login.php">
                <input type="submit" value="Login" class="topL">
            </form>
        </div>
        <form action="createAccount.php" method="POST">>
            <div class="inputs">
                <input type="text" name="username" class="username" placeholder="Enter username" required> <br>
                <input type="email" name="email" class="email" placeholder="Enter email" required> <br>
                <input type="password" name="password" class="password" placeholder="Enter password" required>
            </div>
            <input type="submit" class="submit" value="Register">
        </form>
    </div>
</body>
</html>