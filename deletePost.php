<?php
    session_start();
    include("database.php");

    $id = $_POST["id"];
    $code = "DELETE FROM `posts` WHERE `id` LIKE '$id'";
    $sql = mysqli_query($db, $code);
    header("Location: home.php");
?>