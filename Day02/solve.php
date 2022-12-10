<?php

//X win, Y draw, Z lose
$riggedLookup = array("X" =>0, "Y"=> 3,"Z"=> 6);
//losing part played for each member.
$riggedPartLookup = array( "A X"=> 3, "B X"=>1, "C X"=>2,
                        "A Y"=> 1, "B Y"=>2, "C Y"=>3,
                        "A Z"=> 2, "B Z"=>3, "C Z"=>1);


$elfScoreLookUp = array("A" => 1, "B"=> 2,"C"=> 3);
$playerScoreLookUp = array("X" =>1, "Y"=> 2,"Z"=> 3);
$outcomeLookup = array( "A X"=> 3, "A Y"=>6, "A Z"=>0,
                        "B X"=> 0, "B Y"=>3, "B Z"=>6,
                        "C X"=> 6, "C Y"=>0, "C Z"=>3);
$totalScore = 0;

$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.

        $line = trim($line);
        $pieceScore = $riggedPartLookup[$line];
        //var_dump($line);
        $pizza = explode(" ", $line);

        $outcome = $riggedLookup[$pizza[1]];
        $currentScore = $outcome + $pieceScore;
        echo "Current Score: $currentScore \n";
        $totalScore += $currentScore;
    }

    echo "TOTAL:: $totalScore \n";
    fclose($handle);
}

?>