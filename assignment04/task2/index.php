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
    <body>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
        
        <form method="post">
            <textarea name="note"></textarea>
            <button type="submit" name="addNote">Add</button>
        </form>
        
        <table id="showNotesTable">
        
        </table>
    </body>
</htmL>