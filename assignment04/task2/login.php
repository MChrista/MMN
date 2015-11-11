<?php
session_start();
require_once("./UserHandler.php");

if(isset($_SESSION['loggedIn'])){
    header("Location: index.php");
}

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $uh = new UserHandler();
    if($uh->loginUser($user, $password)){
        $_SESSION['loggedIn'] = true;
        header("Location: index.php");
    }else{
        echo "login failed";
    }
}

?>

<html>
    <body>
        <form name="loginForm" method="post" action="login.php">
            <label>User</label>
            <input name="user" id="user"/>
            <input name="password" id="password" type="password"/>
            <input name="submitLogin" id="submitLogin" type="submit" value="Login"/>
        </form>
    </body>
</html>