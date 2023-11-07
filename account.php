<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topMenu">
        <a class="topButton" href="home.php">Home</a>
        <a class="topButton" href="search.php">Search</a>
        <a class="topButton" href="newPost.php">Create</a>
        <a class="topButton" href="messages.php">Messages</a>
        <a class="topButton" href="account.php">Account</a>
    </div>
    <div class="accountMain">
        <?php
            include("database.php");
            session_start();            
            if (isset($_SESSION["username"])) {
                if (isset($_POST["accountName"])) {
                    $username = $_POST["accountName"];
                }
                else { 
                    $username = $_SESSION["username"];
                }   
                echo '<div class="accountUsername">' . $username . '</div>';

                $code = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
                $sql = mysqli_query($db, $code);
                while ($row = mysqli_fetch_array($sql)) {
                    echo '<div class="stats">';
                    echo '<div class="statNumber">' . $row["followers"] . '</div>';
                    echo '<div class="statNumber">' . $row["following"] . '</div>';
                    echo '<div class="statNumber">' . $row["likes"] . '</div>';
                    echo '</div>';
                    echo '<div class="stats">';
                    echo '<form action="followers.php" method="POST" class="accountFollowers">';
                    echo '<input type="hidden" name="AccountUsername" value="' . $username . '"></input>';
                    echo '<input type="submit" class="statNumberName" value="Followers"></input>';
                    echo '</form>';
                    echo '<form action="following.php" method="POST" class="accountFollowers">';
                    echo '<input type="hidden" name="AccountUsername" value="' . $username . '"></input>';
                    echo '<input type="submit" class="statNumberName" value="Following"></input>';
                    echo '</form>';
                    echo '<div class="statNumberNameLikes"> Likes </div>';
                    echo '</div>';
                }

                echo '<form action="logout.php">';

                echo '<input type="submit" value="logout"> </input>';
                
                echo '</form>';
            }
            else {
                header("Location: login.php");
            }
        ?>
    </div>
</body>
</html>