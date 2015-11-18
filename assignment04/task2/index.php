<?php
session_start();
require_once("./UserHandler.php");
require_once("./NotesHandler.php");

echo $_SESSION['userID'];

if(!isset($_SESSION['loggedIn'])){
    header("Location: login.php");
}

if(isset($_POST['logout'])){
    $uh = new UserHandler();
    $uh->logoutUser();
    header("Location: login.php");
}

if(isset($_POST['addNote'])){
    $nh = new NotesHandler();
    $nh->addNewNote($_POST['note']);
}




?>

<htmL>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <link href="index.css" type="text/css" rel="stylesheet">
    <body>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
        
        <form method="post">
            <textarea name="note"></textarea>
            <button type="submit" name="addNote">Add</button>
        </form>
        
        <div class="noteDisplay">
            <p>Meine erste Notiz</p>
            <button>remove</button>
        </div>
    </body>
</htmL>