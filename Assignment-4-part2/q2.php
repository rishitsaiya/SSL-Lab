<?php

function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
  die();
}

set_error_handler("customError",E_USER_ERROR);

$input = array();

for ($i=1;$i<$argc;$i++) {
    $input[$i]=$argv[$i];
}


if($argc>1){
$input = array_map('strtolower', $input);

sort($input);

$c=0;
foreach($input as $value){
	if((is_numeric($value))){
	$c=1;
	}
}

if($c==1)
	trigger_error("Inputs must be only Words"."\n",E_USER_ERROR);
else
	print_r(array_count_values($input));
}
else
	trigger_error("Input after file name must be atleast 1"."\n",E_USER_ERROR);

?>
