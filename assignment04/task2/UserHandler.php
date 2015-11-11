<?php
require_once('./DatabaseHandler.php');

class UserHandler {
    
    function registerNewUser($user, $password){
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        $dbh = new DatabaseHandler();
        $dbh->safeUser($user,$hashedPassword);
    }
    
    function loginUser($user, $password){
        $dbh = new DatabaseHandler();
        $hashedPasswordInDb = $dbh->getPasswordOfUser($user);
        if(password_verify($password, $hashedPasswordInDb)){
            return true;
        }else{
            return false;
        }
    }
    
    function logoutUser(){
        $_SESSION = array();
        session_destroy();
    }
    
}