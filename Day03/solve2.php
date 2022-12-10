<?php

// fBDGBcBrG DvjPtPtPV

$total = 0;
$count = 0;
$lineGroups = array();

$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $mod = $count % 3;
        $count++;
        $line = trim($line);
        echo "SET ".($count/3)." LINE $count MOD :: $mod \n";
        $lineGroups[$mod] = $line;
        if($mod == 2){
            //sort each line.
            $sackA = str_split($lineGroups[0]);
            $sackB = str_split($lineGroups[1]);
            $sackC = str_split($lineGroups[2]);

            foreach ($sackA as $key => $value) {
                if(in_array($value, $sackB) && in_array($value, $sackC)){
                    $numericValRaw = ord($value);
                    $numericValLowercase = $numericValRaw - 96;
                    if($numericValLowercase < 1){
                        $numericVal = $numericValRaw - 64 + 26;
                    }else{
                        $numericVal = $numericValLowercase;
                    }
                    $total += $numericVal;
                    echo ($count/3)." THE BADGE IS :: ($value) - ($numericVal) \n";
                    break;
                    
                }
            }
        }
    }

    echo "TOTAL :: $total for $count lines.\n";
    fclose($handle);
}

?>