<?php
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
        function loadChannels() {
            $("#usersMessages").load("loadChannels.php", {
                channelID: id
            });
        }
        loadChannels();
        loadMessages();
        setInterval(loadChannels, 1000);
        setInterval(loadMessages, 1000);
    });
    </script>
</head>
<body>
    <div class="topMenu">
        <a class="topButton" href="home.php">Home</a>
        <a class="topButton" href="search.php">Search</a>
        <a class="topButton" href="newPost.php">Create</a>
        <a class="topButton" href="messages.php">Messages</a>
        <a class="topButton" href="account.php">Account</a>
    </div>
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
    <div class="usersMessages" id="usersMessages">
    </div>
    <div class="messages" id="messages">

    </div>
</body>
</html>
