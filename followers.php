<?php
    include("database.php");
    session_start();

    if (isset($_POST["AccountUsername"])) {
        $username = $_POST["AccountUsername"];
    }
    else {
        $username = $_SESSION["username"];
    }
    $code = "SELECT * FROM `following` WHERE `following` LIKE '$username'";
    $sql = mysqli_query($db,$code);
    while($row = mysqli_fetch_array($sql)){
        echo '<form action="account.php" method="POST">';
        echo '<input type="hidden" name="accountName" value="' . $row['username'] . '"></input>';
        echo '<input type="submit" value="' . $row["username"] . '"></input>';
        echo '</form>'; 

        $username = $row["username"];

        $check = "SELECT * FROM `following` WHERE `following` LIKE '$username'";
        $doCheck = mysqli_query($db,$check);

        if(mysqli_num_rows($doCheck) == 0){
            echo '<form action="follow.php" method="POST">';
            echo '<input type="hidden" name="owner" value="' . $row["username"] . '"> </input>';
            echo '<input type="submit" value="follow"> </input>';
            echo '</form>';
        } 
        else {
            
        }
    }
?>