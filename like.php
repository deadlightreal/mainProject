<?php
    session_start();
    include("database.php");

    $username = $_SESSION["username"];
    $postid = $_POST["postid"];

    $code = "INSERT INTO `likes` (`postid`, `liked`) VALUES ('$postid', '$username')";
    $postCode = "UPDATE `posts` SET `likes` = `likes` + 1 WHERE `id` LIKE '$postid'";

    $postSelect = "SELECT `owner` FROM `posts` WHERE `id` LIKE '$postid'";
    $selectPost = mysqli_query($db, $postSelect);
    while ($row = mysqli_fetch_array($selectPost)) {
        $owner = $row["owner"];
    }

    $likeCode = "UPDATE `users` SET `likes` = `likes` + 1 WHERE `username` LIKE '$owner'";
    $addLikeToUser = mysqli_query($db, $likeCode);  

    $addLike = mysqli_query($db, $postCode);
    $mysql = mysqli_query($db, $code);
    header("Location: home.php");
?>