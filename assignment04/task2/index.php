<?php
session_start();
require_once("./UserHandler.php");

if(!isset($_SESSION['loggedIn'])){
    header("Location: login.php");
}

if(isset($_POST['logout'])){
    $uh = new UserHandler();
    $uh->logoutUser();
    header("Location: login.php");
}


?>

<htmL>
    <body>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </body>
</htmL>