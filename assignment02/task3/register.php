<!DOCTYPE html>
/*
* Das Captcha fehlt. Alle anderen Anforderungen wurden umgesetzt.
* Das Errorhandling stellt bei dieser Aufgabe ein Problem dar. Wo sollen die Variablen gesetzt und ausgewertet werden. Durch die Fehlerbehandlung im PHP hat man die Schwierigkeiten, dass man die Variablen in der Ansicht * erneut auswerten muss.
*/


<?php
    define('MIN_PASSWORD_LENGTH',5);
?>


<html>
    <form id="register" action="register.php" method="POST">
        <label>First name</label>
        <input id="firstName" name="firstName" value="<?php echo $_POST['firstName'] ?>" required></input><br>
        <label>Last name</label>
        <input id="lastName" name="lastName" value="<?php echo $_POST['lastName']?>" required></input><br>
        <label>email</label>
        <input id="email" name="email" value="<?php echo $_POST['email']?>" required></input>
        <?php
        if(!checkEmail()){
            ?><label><?php echo "Bitte geben Sie ein gueltige E-Mail an" ?></label><?php
        }
        ?>
        <br>
        <label>Password</label>
        <input type="password" id="password" name="password"></input>
        <?php
        if(!checkPassword()){
            ?><label><?php echo "Die eingegebenen Passwoerter entsprechen nicht der Richtlinie" ?></label><?php
        }
        ?>
        <br>
        <label>Password confirmation</label>
        <input type="password" id="passwordConfirmation" name="passwordConfirmation"></input><br>
        <label>Message</label>
        <textarea id="registerMessage" name="registerMessage"><?php echo $_POST['registerMessage']?></textarea><br>
        <input type="submit" id="submitBtn" value="Register" name="submitBtn"></input>
    </form>

<?php
if(isset($_POST['submitBtn'])){
    //removeRegisterCookies();
    if(checkFirstname()){
        if(checkLastname()){
            if(checkEmail()){
                if(checkPassword()){
                    header("Location: startPage.php");
                }
            }else{
                setCookieForEmailError();
            }
        }
    }else{
        setCookieForFirstnameError();
    }
    
 
}
               
function checkFirstname(){
    if(isset($_POST['firstName'])){
        if($_POST['firstName'] != ""){
            return true;
        }     
    }else{
        return false;
    }
}

function checkLastname(){
    if(isset($_POST['lastName'])){
        if($_POST['lastName'] != ""){
            return true;
        }
    }else{
        return false;
    }
}
            

function checkEmail(){
    if(preg_match('/^[a-zA-Z0-9\.\-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9\.\-]+$/',$_POST['email'])){
        return true;
    }else{
        return false;
    }
    
}
               
function checkPassword(){
    if(isset($_POST['password'])){
        if(checkPasswordLength($_POST['password'])){
            //if(checkPasswordEquality($_POST['password'], $_POST['passwordConfirmation'])){
                return true;
            //}
        }
    }
    return false;
}

function checkPasswordLength($password){
    if(strlen($password) >= MIN_PASSWORD_LENGTH){
        return true;
    }else{
        return false;
    }
}
            
function checkPasswordEquality($password, $confirmationPassword){
    if($password == $confirmationPassword){
        return true;
    }else{
        return false;
    }
    
}
            
            


?>




</html>
