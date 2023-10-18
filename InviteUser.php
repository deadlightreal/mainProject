<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="InviteUserAction.php" method="POST">
        <input type="text" name="username">
        <?php
        echo '<input type="hidden" name="id" value="' . $_POST["chanellid"] . '">';
        ?>
        <input type="submit" value="Invite">
    </form>
</body>
</html>