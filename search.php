<?php
    session_start();
    if(isset($_SESSION["username"])){

    }
    else {
        header("login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head> 
<body>
    <div class="topMenu">
        <a class="topButton" href="home.php">Home</a>
        <a class="topButton" href="search.php">Search</a>
        <a class="topButton" href="newPost.php">Create</a>
        <a class="topButton" href="messages.php">Messages</a>
        <a class="topButton" href="account.php">Account</a>
    </div>
    <div class="searchUsers" id="searchUsers">

    </div>
    <form action="searchUser.php" method="POST">
        <input id="usernameSearch" type="text" name="username">
    </form>
    <script>

        
    function reloadSearch(){
        var username = document.getElementById("usernameSearch").value;
        $("#searchUsers").load("searchUser.php", {
            username: username
        })
    }

    setInterval(reloadSearch, 400);
    </script>
</body>
</html>