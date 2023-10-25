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
    <form action="addPost.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="file" required>
        <input type="text" name="description" id="description" required>
        <input type="submit" value="Add Post">
    </form>
</body> 
</html>