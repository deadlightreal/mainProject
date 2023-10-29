<?php
    include("database.php");
    session_start();

    $owner = $_POST["owner"];
    $username = $_SESSION["username"];

    $following = "INSERT INTO `following` (`username`, `following`) VALUES ('$username', '$owner')";
    $setFollowers = "UPDATE `users` SET `followers` = `followers` + 1 WHERE `username` LIKE '$owner'";
    $setFollowing = "UPDATE `users` SET `following` = `following` + 1 WHERE `username` LIKE '$username'";

    $followingDo = mysqli_query($db, $following);
    $doFollowers = mysqli_query($db, $setFollowers);
    $doFollowing = mysqli_query($db, $setFollowing);
    header("Location: home.php");
?>