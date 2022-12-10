<?php
$currentCals = 0;
$maxCalsArray = array(0, 0, 0);


$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
    	if(is_numeric($line)){
    		$currentCals += $line;
    	}

        if((strpos($line, PHP_EOL) == 0) && (strpos($line, PHP_EOL) !== FALSE)) {
        	array_push($maxCalsArray, $currentCals);
        	rsort($maxCalsArray);
        	array_values($maxCalsArray);
        	unset($maxCalsArray[3]);
        	$currentCals = 0;
        }
    }
    echo "FINISHED \n";
    echo $maxCalsArray[0]. "\n";
    echo $maxCalsArray[1]. "\n";
    echo $maxCalsArray[2]. "\n";
    $maxCalTotal = $maxCalsArray[0] + $maxCalsArray[1] + $maxCalsArray[2];
    echo "TOTAL:: $maxCalTotal \n";
    fclose($handle);
}

?>