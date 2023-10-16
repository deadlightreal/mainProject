<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="usersMessages">
        <?php
            include "database.php";
            session_start();
            $username = $_SESSION["username"];

            $selectUsers = "SELECT * FROM `channels` WHERE `member1` LIKE '$username' OR `member2` LIKE '$username'";
            $displayUsers = mysqli_query($db, $selectUsers);

            while ($resultsUsers = mysqli_fetch_array($displayUsers)) {
                echo '<form action="messages.php" method="POST" class="userForm">';
                echo '<input type="hidden" name="id" value="' . $resultsUsers["id"] . '">';
                echo '<input type="submit" class="user" value="' . $resultsUsers["name"] . '">';
                echo '</form>';
            }
        ?>

    </div>
    <div class="messages">
        <?php
            include "database.php";
            $username = $_SESSION["username"];
            if(isset($_POST["id"])) {
                $chanelid = $_POST["id"];
                $_SESSION["channelid"] = $_POST["id"];

                $code = "SELECT * FROM `messages` WHERE `to` LIKE '$chanelid'";
                $displayMessages = mysqli_query($db, $code);
                while ($resultsMessages = mysqli_fetch_array($displayMessages)) {
                    echo '<div>' . $resultsMessages["content"] . '</div>';
                }
            }
            else if(isset($_SESSION["channelid"])) {
                $chanelid = $_SESSION["channelid"];

                $code = "SELECT * FROM `messages` WHERE `to` LIKE '$chanelid'";
                $displayMessages = mysqli_query($db, $code);
                while ($resultsMessages = mysqli_fetch_array($displayMessages)) {
                    echo '<div>' . $resultsMessages["content"] . '</div>';
                }
            }
            else {

            }
        ?>
    </div>
</body>
</html>
