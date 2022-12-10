<?php
$total = 0;
$count = 0;

$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $count++;

        $line = trim($line);
        $workSets = explode(",", $line);
        $workSetA = explode("-", $workSets[0]);
        $workSetB = explode("-", $workSets[1]);

        //5-7,7-9
        //7
        //7



        $minHIGH = min($workSetA[1], $workSetB[1]);
        $maxLOW = max($workSetA[0], $workSetB[0]);
        $overlapAmount = max(-1, $minHIGH - $maxLOW);

        echo "Overlap Amount: $overlapAmount \n";
        if($overlapAmount > -1){
            echo "OVERLAP :: $line \n";
            $total++;
        }

/*        $AinB = ($workSetA[0] >= $workSetB[0]) && ($workSetA[1] <= $workSetB[1]);
        $BinA = ($workSetA[0] <= $workSetB[0]) && ($workSetA[1] >= $workSetB[1]);

        if($AinB || $BinA){
            echo "OVERLAP :: $line \n";
            $total++;
        }*/
    } //--end while

    echo "TOTAL :: $total for $count lines.\n";
    fclose($handle);
} //--end if

?>