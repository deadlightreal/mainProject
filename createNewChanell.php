<?php
    include "database.php";
    session_start();

    $username = $_SESSION["username"];
    $name = $_POST["name"];

    $insert = "INSERT INTO `channels` (`name`, `member1`) VALUES ('$name', '$username')";
    $sql = mysqli_query($db, $insert);
    header("Location: messages.php");
?>