<?php
    session_start();
    include("database.php");
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
    else if (isset($_SESSION["channelid"])) {
        $id = $_SESSION["channelid"];    
    }
    else {
        $id = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        $(document).ready(function() {
        var id = <?php echo $id; ?>;

        function loadMessages() {
            $("#messages").load("load-messages.php", {
                channelID: id
            });
        }
        loadMessages();
        setInterval(loadMessages, 1000);
    });
    </script>
</head>
<body>
    <form action="createChannel.php">
        <input type="submit" value="Create New Message Channel">
    </form>
    <form action="sendMessage.php" method="POST" class="SendMessageDiv">
        <?php
            if(isset($_SESSION["username"])) {

            }
            else {
                header("Location: login.php");
            }
            if(isset($_POST["id"])) {
                echo '<input type="hidden" name="id" value="' . $_POST["id"] . '">';
                echo '<input type="text" name="content" id="content" class="content">';
                echo '<input type="submit" class="sendMessage" value="Send Message">';
            }
            else if(isset($_SESSION["channelid"])) {
                echo '<input type="hidden" name="id" value="' . $_SESSION["channelid"] . '">';
                echo '<input type="text" name="content" id="content" class="content">';
                echo '<input type="submit" class="sendMessage" value="Send Message">';
            }
            else {

            }
        ?>
    </form>
    <form action="InviteUser.php" method="POST">
        <?php
            if(isset($_POST["id"])) {
                echo '<input type="hidden" name="chanellid" value="' . $_POST["id"] . '">';
                echo '<input type="submit" class="" value="Invite User">';
            }
            else if(isset($_SESSION["channelid"])) {
                echo '<input type="hidden" name="chanellid" value="' . $_SESSION["channelid"] . '">';
                echo '<input type="submit" class="" value="Invite User">';
            }
            else {

            }
        ?>
    </form>
    <div class="usersMessages">
        <?php
            $username = $_SESSION["username"];

            $selectUsers = "SELECT * FROM `channels` WHERE `member1` LIKE '$username'";
            $displayUsers = mysqli_query($db, $selectUsers);

            while ($resultsUsers = mysqli_fetch_array($displayUsers)) {
                echo '<form action="messages.php" method="POST" class="userForm">';
                echo '<input type="hidden" name="id" value="' . $resultsUsers["id"] . '">';
                echo '<input type="submit" class="user" value="' . $resultsUsers["name"] . '">';
                echo '</form>';
            }
        ?>
        <?php
            $selectChannels = "SELECT * FROM `invited` WHERE `invited` LIKE '$username'";
            $displayChannels = mysqli_query($db, $selectChannels);

            while ($resultsChannels = mysqli_fetch_array($displayChannels)) {
                $invitedid = $resultsChannels["chanellid"];

                $selectInvited = "SELECT * FROM `channels` WHERE `id` LIKE '$invitedid'";
                $doSelectedInvited = mysqli_query($db, $selectInvited);

                while ($resultsSelectedInvited = mysqli_fetch_array($doSelectedInvited)) {
                    echo '<form action="messages.php" method="POST" class="userForm">';
                    echo '<input type="hidden" name="id" value="' . $resultsSelectedInvited["id"] . '">';
                    echo '<input type="submit" class="user" value="' . $resultsSelectedInvited["name"] . '">';
                    echo '</form>';
                }    
            }
        ?>

    </div>
    <div class="messages" id="messages">
        <?php
        if (isset($_SESSION["channelid"])) {

        }
        else if (isset($_POST["id"])) {
            $_SESSION["channelid"] = $_POST["id"];
        }
        else {

        }
        ?>
    </div>
</body>
</html>
