<?php
    session_start();
    $id = $_POST["channelID"];
    include "database.php";
    $username = $_SESSION["username"];
        if(isset($_POST["id"])) {
            $chanelid = $_POST["id"];
            $_SESSION["channelid"] = $_POST["id"];
            echo $id;

            $code = "SELECT * FROM `messages` WHERE `to` LIKE '$chanelid'";
            $displayMessages = mysqli_query($db, $code);
            while ($resultsMessages = mysqli_fetch_array($displayMessages)) {
            if ($resultsMessages["sender"] == $username) {
                echo '<div class="myMessage">';
                echo '<div class="sender">' . $resultsMessages["sender"] . '</div>';
                echo '<div>' . $resultsMessages["content"] . '</div>';
                echo '</div>';
            }
            else {
                echo '<div class="otherMessage">';
                echo '<div class="sender">' . $resultsMessages["sender"] . '</div>';
                echo '<div>' . $resultsMessages["content"] . '</div>';
                echo '</div>';
            }
        }
    }
?>