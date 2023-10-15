<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>
<body>
    <?php
        include "database.php";
        session_start();

        $username = $_SESSION["username"];

        $select = "SELECT * FROM `messages` WHERE `sender` LIKE '$username'";
        $myMessages = mysqli_query($db, $select);

        while ($resultMy = mysqli_fetch_array($myMessages)) {
            echo '<div>' . $resultMy["content"] . '</div>';
        }
    ?>
</body>
</html>
