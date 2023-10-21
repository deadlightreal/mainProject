<?php
    include("database.php");
    session_start();
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