<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include("database.php");
    
        $code = "SELECT * FROM `posts`";
        $sql = mysqli_query($db, $code);
        while($row = mysqli_fetch_array($sql)) {
            echo '<div>' . $row["owner"] . '</div>';
            echo '<div>' . $row['description'] . '</div>';
            echo '<img src="posts/'. $row['id'] . '.png" width="500" height="500"></img>';
        }
    ?>
</body>
</html>