<?php
    include "database.php";
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $code = "SELECT * FROM `users` WHERE `username` LIKE '$username'";

    $result = mysqli_query($db, $code);
    
    $row = mysqli_fetch_array($result);
    if(isset($row["username"])) {
        if($password == $row["password"]) {
            echo "Logged in!!!";
            header("Location: home.php");
            $_SESSION["username"] = $row["username"];
        }
        else {
            echo "Wrong password!!!";
        }
    }
    else {
        echo "Wrong username!!!";
        header("Location: login.php");
    }
?>