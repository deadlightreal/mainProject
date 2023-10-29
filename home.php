<?php
    session_start();
    if(isset($_SESSION["username"])) {
    }
    else {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
    <?php
        include("database.php");
    
        $code = "SELECT * FROM `posts`";
        $sql = mysqli_query($db, $code);
        $username = $_SESSION["username"];
        while($row = mysqli_fetch_array($sql)) {
            $codeSelect = "SELECT * FROM `likes` WHERE `liked` LIKE '$username'";
            $select = mysqli_query($db, $codeSelect);

            $username = $_SESSION["username"];

            $owner = $row["owner"];

            $selectFollowing = "SELECT * FROM `following` WHERE `username` LIKE '$username' AND `following` LIKE '$owner'";
            $doFollowing = mysqli_query($db, $selectFollowing);
            echo '<div class="post">';
            if($username == $owner) {

            }
            else {
                if (mysqli_num_rows($doFollowing) > 0) {
                    echo '<form action="unfollow.php" method="POST">';
                    echo '<input type="hidden" name="owner" value="' . $row["owner"] . '"> </input>';
                    echo '<input type="submit" value="unfollow"> </input>';
                    echo '</form>';
                }
                else {
                    echo '<form action="follow.php" method="POST">';
                    echo '<input type="hidden" name="owner" value="' . $row["owner"] . '"> </input>';
                    echo '<input type="submit" value="follow"> </input>';
                    echo '</form>';
                }
            }
            echo '<div>' . $row["owner"] . '</div>';
            echo '<img src="posts/' . $row['id'] . '.' . $row['extention'] . '" width="500" height="500"></img>';
            echo '<div>' . $row['description'] . '</div>';

            echo '<div class="bottomButtons">';
            if(mysqli_num_rows($select) > 0) {
                $id = $row['id'];

                echo '<form action="deletelike.php" method="POST">';

                echo '<input type="hidden" name="postid" value="' . $row['id'] . '"></input>';
                echo '<input type="submit" value="Liked"> </input>';
                echo '</form>';
            }
            else {
                echo '<form action="like.php" method="POST">';

                echo '<input type="hidden" name="postid" value="' . $row['id'] . '"></input>';
                echo '<input type="submit" value="Like"> </input>';
    
                echo '</form>';
            }

            echo '<div>' . $row["likes"] .  '</div>';

            if ($username == $row["owner"]) {
                echo '<form action="deletePost.php" method="POST">';

                echo '<input type="hidden" name="id" value="' . $row["id"] . '"></input>';
                echo '<input type="submit" value="delete post"></input>';
                
                echo '</form>';
            }
            echo '</div>';

            echo '</div>';
        }
    ?>
</body>
</html>