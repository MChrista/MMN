<?php 
require_once('./UserHandler.php');

var_dump($_POST);
if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $_POST['user'];
    $password = $_POST['password'];   
    $userHandler = new UserHandler();
    $userHandler->registerNewUser($user, $password);
    header("Location: login.php");
}

?>

<html>
    <h2>Registration for Notes</h2>
    <body>
        <form id="registerForm" name="registerForm" method="post">
            <label>Username</label>
            <input name="user" type="text" required></input><br>
            <label>Password</label>
            <input name="password" type="password" required></input><br>
            <input type="submit" value="register"></input>
        </form>
    </body>
</html>
