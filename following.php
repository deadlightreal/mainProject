<?php
    include("database.php");
    session_start();

    $username = $_SESSION["username"];
    $code = "SELECT * FROM `following` WHERE `username` LIKE '$username'";
    $sql = mysqli_query($db,$code);
    while($row = mysqli_fetch_array($sql)){
        echo '<div>' . $row["following"] . '</div>';    
        echo '<form action="unfollow.php" method="POST">';
        echo '<input type="hidden" name="owner" value="' . $row["following"] . '"> </input>';
        echo '<input type="submit" value="unfollow"> </input>';
        echo '</form>';
    }
?>