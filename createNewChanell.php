<?php
    include "database.php";
    session_start();

    $username = $_SESSION["username"];
    $name = $_POST["name"];
    $member2 = $_POST["member2"];

    $insert = "INSERT INTO `channels` (`name`, `member1`, `member2`) VALUES ('$name', '$username', '$member2')";
    $sql = mysqli_query($db, $insert);
    header("Location: messages.php");
?>