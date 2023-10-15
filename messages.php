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

            $selectUsers = "SELECT * FROM `users`";
            $displayUsers = mysqli_query($db, $selectUsers);

            while ($resultsUsers = mysqli_fetch_array($displayUsers)) {
                echo '<form action="messagesDisplay" method="POST" class="userForm">';
                echo '<input type="submit" class="user" value="' . $resultsUsers["username"] . '">';
                echo '</form>';
            }
        ?>

    </div>
    <?php
        $username = $_SESSION["username"];

        $select = "SELECT * FROM `messages` WHERE `sender` LIKE '$username'";
        $myMessages = mysqli_query($db, $select);

        while ($resultMy = mysqli_fetch_array($myMessages)) {
            echo '<div>' . $resultMy["content"] . '</div>';
        }
    ?>
</body>
</html>
