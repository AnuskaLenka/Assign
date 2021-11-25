<?php

function matchword($character)
{
    global $word;

    for ($i = 0; $i < count($word); $i++) {
        if (strcasecmp($character, $word[$i])) {
            echo "WIN";
            die();
        } else {
            take_input();
        }
    }
}
function yespresent($input)
{
    global $word;
    $char = "";
    if ($char != null) {
        $input_cahr = ($char . $input);
    }
    $lives = 6;
    $index = 0;
    $flag = true;
    for ($i = 0; $i < count($word); $i++) {
        echo $input_cahr;
        if (strpos($word[$i], $input_cahr)) {
            $char = $input_cahr;
            echo "please enter next word";
            $flag = false;

            break;
            matchword($char);
        }
    }
    function take_input()
{
    $word = array("Rain", "orange", "bag", "house", "ball", "bird", "car", "mirror", "man", "cloud",);

    $input_cahr = readline("word");
    if ($input_cahr == null) {
        echo 'Please Type word';
    } else if (strlen($input_cahr) > 1) {
        echo 'type something';
    } else {
        yespresent($input_cahr);
    }
}
take_input();
    if ($flag == true) {
        echo "you lost".--$lives;
        if ($lives == 0) {
            die("Try again");
        }
    }
}
function check($Input, $answer)
    {
        $w = 0;
        $wrongGuess = true;
        while($w < count($answer))
        {
            if ($answer[$w] == $Input)
            {
                echo "The word is correct";
            }
            
        }
        if (!$wrongGuess) $answer['attempts'] = $answer['attempts'] - 1;
        {
            echo "Try again";
        }
        
    }

?>