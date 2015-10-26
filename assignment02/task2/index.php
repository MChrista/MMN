<!DOCTYPE html>
<html>
    <head>
        <h1>Assignment 2 - Shuffle Words</h1>
    </head>
    <body>
        <form id="shuffleboard" action="index.php" method="get">
            <textarea style="width: 400px;height: 400px;" name="text"><?php 
                if(isset($_GET['text'])){
                    $word_arr = explode(" ",$_GET['text']);
                    
                    for($i = 0; $i < count($word_arr); $i++){
                        $word = $word_arr[$i];
                        $first_char = substr($word,0,1);
                        $shuffled_chars = str_shuffle(substr($word,1,strlen($word)-2));
                        $last_char = substr($word,strlen($word)-1,1);
                        $word_arr[$i] = $first_char . $shuffled_chars . $last_char;
                    }
                    
                    $shuffled_text = implode(" ",$word_arr);
                    
                    //$text_array = explode();
                    echo $shuffled_text;
                } 
            ?></textarea>
            <button type="submit" name="submit_btn">Shuffle</button>
        </form>
    </body>


</html>