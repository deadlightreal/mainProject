<?php
    session_start();
    include "database.php";

    $username = $_SESSION["username"];
    $invited = $_POST["username"];
    $id = $_POST["id"];

    $insert = "INSERT INTO `invited` (`who`, `invited`, `chanellid`) VALUES ('$username', '$invited', '$id')";
    $sql = mysqli_query($db, $insert);
    header("Location: messages.php");
?>