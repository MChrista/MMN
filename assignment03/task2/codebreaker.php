<?php
session_start();
define('CODELENGTH',4);
define('MAXIMUM_NUMBER_OF_ATTEMPTS', 10);
define('VALID_CHARACTERS',"ABCDEFG");

function generateCode(){
    $shuffledValidCharacters = str_shuffle(VALID_CHARACTERS);
    $newCode = substr($shuffledValidCharacters,0,CODELENGTH);
    return $newCode;
}

function startNewGame(){
    $_SESSION["Code"] = generateCode();
    $_SESSION["attempts"] = 0;
    $_SESSION["WON"] = false;
    $_SESSION["checkSelected"] = false;
    unset($_SESSION["game"]);
}

function handleAttempt(){
    $enteredCode = $_POST["enteredCode"];
    $numberOfAttempt = $_SESSION["attempts"];
    $_SESSION["attempts"]++;
    if($enteredCode == $_SESSION["Code"]){
        $_SESSION["WON"] = true;
    }
    for($i = 0; $i < CODELENGTH; $i++){
        $letter = substr($enteredCode,$i,1);
        $color = getColorOfLetter($letter, $i);
        
        $_SESSION["game"][$numberOfAttempt][$i] = $letter;
        $_SESSION["game"][$numberOfAttempt][$i+4] = $color;
    }
    
    $_POST["enteredCode"] = "";

}

function isLetterInCodeword($letter){
    if(strpos($_SESSION["Code"],$letter) === false){
        return false;
    }else{
        return true;
    }
}

function isLetterInCodewordAndAtRightPosition($letter, $position){
    $letterInCodewort = substr($_SESSION["Code"],$position,1);
    if($letterInCodewort === $letter){
        return true;
    }else{
        return false;
    }
    
}

function getColorOfLetter($letter, $position){
    if(isLetterInCodewordAndAtRightPosition($letter, $position)){
        return "RED";
    }else if(isLetterInCodeword($letter)){
        return "BLACK";
    }else{
        return "WHITE";
    }
    
}

function getColorByWord($word){
    switch($word){
        case "RED":
            return "#FF0000";
        case "WHITE":
            return "#FFFFFF";
        case "BLACK":
            return "#000000";
        default:
            return "#0000ff";
    }
    
}



function fillGameboardTable(){
    
    for($i = 0; $i< count($_SESSION["game"]); $i++){
    ?>
        <tr>
            <td><input style="width: 20px" value="<?php echo $_SESSION['game'][$i][0]?>" readonly </input></td>
            <td><input style="width: 20px" value="<?php echo $_SESSION['game'][$i][1]?>" readonly </input></td>
            <td><input style="width: 20px" value="<?php echo $_SESSION['game'][$i][2]?>" readonly </input></td>
            <td><input style="width: 20px" value="<?php echo $_SESSION['game'][$i][3]?>" readonly </input></td>
            <td><input style="width: 40px; background: <?php echo getColorByWord($_SESSION['game'][$i][4]); ?>;" readonly </input></td>
            <td><input style="width: 40px; background: <?php echo getColorByWord($_SESSION['game'][$i][5]); ?>;" readonly </input></td>
            <td><input style="width: 40px; background: <?php echo getColorByWord($_SESSION['game'][$i][6]); ?>;" readonly </input></td>
            <td><input style="width: 40px; background: <?php echo getColorByWord($_SESSION['game'][$i][7]); ?>;" readonly </input></td>
        </tr>
    
    <?php
    }

}




function render(){
    ?>
    <html>
        <h1>Codebreaker</h1>
        <body>
            <div style="width: 400px; float: left">
                
                <table id="gameBoard">
                    <tbody>
                        <?php fillGameboardTable(); ?>
                    </tbody>
                </table>
                <?php
                if($_SESSION["WON"]){
                    ?>You WON<?php 
                }else if($_SESSION["attempts"] >= MAXIMUM_NUMBER_OF_ATTEMPTS){
                   ?>You LOST<?php 
                }else{
                    ?>
                <form action="codebreaker.php" method="post">
                    <label>Enter your Code</label><br>
                    <input type="text" name="enteredCode" pattern="^[A-G]{4}$" title="Allowed Characters are ABCDEFG"></input><br>
                    <input type="submit" value="try" name="attempt"></input>
                </form>
                <?php
                }
                ?>
                
            </div>
            <div>
                <form action="codebreaker.php" method="get">
                    <?php
                    for($i=0; $i < CODELENGTH; $i++){?>
                    <input style="width: 20px" value="<?php if($_SESSION['checkSelected']){
                        echo substr($_SESSION['Code'],$i,1);
                    }
                    ?>
                    " readonly>
                    </input>
                    <?php }?>
                    <input type="submit" value="check" name="check"></input>
                </form>
                <form action="codebreaker.php" method="post">
                    <input type="submit" value="restart" name="restart"></input>
                </form>
            </div>
        </body>
    </html>


    <?php
    
}


if(isset($_POST["attempt"])){
    handleAttempt();
}else if(isset($_POST["restart"])){
    startNewGame();
}else if(isset($_GET["check"])){
    $_SESSION["checkSelected"] = true;
    $_SESSION["attempts"] = MAXIMUM_NUMBER_OF_ATTEMPTS;
}else{
    startNewGame();
}
render();

?>