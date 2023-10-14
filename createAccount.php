<?php
    include "database.php";

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $code = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    $create = mysqli_query($db, $code);
    header("Location: login.php");
?>