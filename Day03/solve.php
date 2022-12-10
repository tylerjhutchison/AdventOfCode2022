<?php

// fBDGBcBrG DvjPtPtPV

$total = 0;
$count = 0;

$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $count++;
        $line = trim($line);
        $length = strlen($line);
        $mid = $length/2;
        $lineA = substr($line, 0, $mid);
        $lineB = substr($line, $mid);

        $compartmentA = str_split($lineA);
        $compartmentB = str_split($lineB);

        echo "$lineA | $lineB \n";

        $matches = array();
        foreach ($compartmentA as $keyA => &$toyA) {
            foreach ($compartmentB as $keyB => &$toyB) {
                if($toyA === $toyB){
                    $numericValRaw = ord($toyA);
                    $numericValLowercase = $numericValRaw - 96;
                    if($numericValLowercase < 1){
                        $numericVal = $numericValRaw - 64 + 26;
                    }else{
                        $numericVal = $numericValLowercase;
                    }
                    echo "$count MATCH :: ($toyA) val ($numericVal) \n\n";
                    $total += $numericVal;
                    //array_push($matches, $toyA);
                    break 2;
                }
            }
        }
        unset($toyA);
        unset($toyB); 
    }

    echo "TOTAL :: $total for $count lines.\n";
    fclose($handle);
}

?>