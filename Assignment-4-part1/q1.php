<?php

#to take from user

$input=array();
#$arrlength = count($input);

#array_push($input,$argv[$i+2]);
$count=-1;

foreach($argv as $value){
	$count=$count+1;
}

#$count=$count-1;
for ($i=0;$i<count;$i++){
	array_push($input,$argv[$i+2]);
}

$k=$argv[1]; #Obtaining k
echo $k;

#$b=sort($a); #Sorting the array in the asceding order

#echo $b[k]; #Printing the kth smallest number
?>
