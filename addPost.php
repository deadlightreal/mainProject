<?php
    include("database.php");
    session_start();
    
    $username = $_SESSION["username"];
    $description = $_POST["description"];

    
    $selectLast = "SELECT LAST_INSERT_ID() AS id";
    $select = mysqli_query($db, $selectLast);
    $row = mysqli_fetch_array($select);
    $postid = $row["id"];
    
    $target = "posts/";
    $fileName = $postid . '.' . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $targetFilePath = $target . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg', 'png', 'jpeg');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $code = "INSERT INTO `posts` (`description`,`owner`, `extention`) VALUES ('$description', '$username', '$fileType')";
            $sql = mysqli_query($db, $code);
            header("Location: home.php");
        }
    }
    else {
        header("newPost.php");
    }


?>