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
                        $word_arr[$i] = shuffleWordWithSpecialCharacters($word);
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


<?php
    function shuffleWord($word){
        $first_char = substr($word,0,1);
        $shuffled_chars = str_shuffle(substr($word,1,strlen($word)-2));
        $last_char = substr($word,strlen($word)-1,1);
        return $first_char . $shuffled_chars . $last_char;
    }


    function shuffleWordWithSpecialCharacters($word){ //Search recursive for special characters
        if(preg_match('/[.,?!:;]/',$word)){
            $first_word = preg_replace('/(.*)([.,?!:;])(.*)/','$1',$word);
            $special_char = preg_replace('/(.*)([.,?!:;])(.*)/','$2',$word);
            $second_word = preg_replace('/(.*)([.,?!:;])(.*)/','$3',$word);
            return shuffleWordWithSpecialCharacters($first_word) . $special_char . shuffleWordWithSpecialCharacters($second_word);
        }else{
            return shuffleWord($word); //if the word contains no special characters, then shuffle
        }
        
    }