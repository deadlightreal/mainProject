<?php
    include("database.php");
    session_start();

    $username = $_SESSION["username"];
    $code = "SELECT * FROM `following` WHERE `following` LIKE '$username'";
    $sql = mysqli_query($db,$code);
    while($row = mysqli_fetch_array($sql)){
        echo '<div>' . $row["username"] . '</div>';
        echo '<form action="follow.php" method="POST">';
        echo '<input type="hidden" name="owner" value="' . $row["username"] . '"> </input>';
        echo '<input type="submit" value="follow"> </input>';
        echo '</form>';    
    }
?>