<?php
require_once('./DatabaseHandler.php');

class UserHandler {
    
    function registerNewUser($user, $password){
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $dbh = new DatabaseHandler();
        $dbh->safeUser($user,$hashedPassword);
    }
    
}