<?php
    include("database.php");
    session_start();
    
    $username = $_SESSION["username"];
    $description = $_POST["description"];

    $target = "posts/";
    $fileName = $_FILES["file"]["name"];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg');
    if (in_array($fileType, $allowTypes)) {
        $code = "INSERT INTO `posts` (`description`, `owner`, `extention`, `likes`) VALUES ('$description', '$username', '$fileType', 0)";
        $sql = mysqli_query($db, $code);
        
        $selectLast = "SELECT LAST_INSERT_ID() AS `id`";
        $select = mysqli_query($db, $selectLast);
        $row = mysqli_fetch_array($select);
        $postid = $row["id"];

        $fileName = $postid . '.' . $fileType;
        $targetFilePath = $target . $fileName;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            header("Location: home.php");
        }
    }
    else {
        header("Location: newPost.php");
    }
?>