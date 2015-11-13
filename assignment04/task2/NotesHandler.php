<?php
session_start();
require_once("./DatabaseHandler.php");

class NotesHandler{
    
    function addNewNote($text){
        $userId = $_SESSION['userID'];
        $dbh = new DatabaseHandler();
        $dbh->safeNewNote($userId,$text);
    }
    
}