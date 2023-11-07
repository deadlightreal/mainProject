<?php
    include "database.php";
    session_start();
    $username = $_POST["username"];
    $UsedCode = $_POST["UsedCode"];
    $Code = $_POST["Code"];

    if($UsedCode == $Code) {
        $_SESSION["username"] = $username;
        header("Location: home.php");
    }
    else {
        header("Location: login.php");
    }
?>