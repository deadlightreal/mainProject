<?php
    include("database.php");
    session_start();

    if (isset($_POST["AccountUsername"])) {
        $username = $_POST["AccountUsername"];
    }
    else {
        $username = $_SESSION["username"];
    }
    $code = "SELECT * FROM `following` WHERE `username` LIKE '$username'";
    $sql = mysqli_query($db,$code);
    while($row = mysqli_fetch_array($sql)){
        echo '<form action="account.php" method="POST">';
        echo '<input type="hidden" name="accountName" value="' . $row['following'] . '"></input>';
        echo '<input type="submit" value="' . $row["following"] . '"></input>';
        echo '</form>';    
        echo '<form action="unfollow.php" method="POST">';
        echo '<input type="hidden" name="owner" value="' . $row["following"] . '"> </input>';
        echo '<input type="submit" value="unfollow"> </input>';
        echo '</form>';
    }
?>