<?php
    include "database.php";
    session_start();
    $to = $_POST["id"];
    $username = $_SESSION["username"];
    $content = $_POST["content"];

    $code = "INSERT INTO `messages` (`content`, `sender`, `to`) VALUES ('$content', '$username', '$to')";
    $insert = mysqli_query($db, $code);
    $_SESSION["channelid"] = $to;
    header("Location: messages.php");
?>