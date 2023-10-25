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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topMenu">
        <a class="topButton" href="home.php">home</a>
        <a class="topButton" href="newPost.php">create</a>
        <a class="topButton" href="messages.php">messages</a>
    </div>
    <?php
        include("database.php");
    
        $code = "SELECT * FROM `posts`";
        $sql = mysqli_query($db, $code);
        while($row = mysqli_fetch_array($sql)) {
            echo '<div class="post">';
            echo '<div>' . $row["owner"] . '</div>';
            echo '<img src="posts/' . $row['id'] . '.' . $row['extention'] . '" width="500" height="500"></img>';
            echo '<div>' . $row['description'] . '</div>';

            echo '</div>';
        }
    ?>
</body>
</html>