<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";
    require "phpmailer/src/SMTP.php";
    session_start();
    include("database.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $code = "SELECT * FROM `users` WHERE `username` LIKE '$username'";
    $sql = mysqli_query($db, $code);
    $code = rand(100000,999999);

    $matching = null;

    $email = null;

    while ($row = mysqli_fetch_array($sql)) {
        if($password != $row["password"]) {
            $matching = false;
            header("Location: login.php");
        }
        else {
            $matching = true;
        }
        $email = $row["email"];
    }
    if($matching == true) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "richardfabianbusiness@gmail.com";
        $mail->Password = "gihhmbaletckbhko";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
    
        $mail->setFrom("richardfabianbusiness@gmail.com");
        $mail->addAddress($email);
    
        $mail->Subject = ("Verify");
        $mail->Body = ("Your Verification Code is: " . $code . "");
        if($email != null) {
            $mail->send();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <form action="findAccount.php" method="POST">
        <input type="text" name="UsedCode" id="">
        <?php
        echo '<input type="hidden" name="Code" value="' . $code . '">';
        echo '<input type="hidden" name="username" value="' . $username . '">';
        ?>
        <input type="submit" value="Verify">
    </form>
</body>
</html>