<?php

function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
  die();
}

set_error_handler("customError",E_USER_ERROR);

$x=$argv[1];
$y=$argv[2];

if($argc==3){
if(strlen($x)>=strlen($y)){
echo substr_count($x,$y);
echo "\n";

$lp = 0;
$pos = array();

while (($lp = strpos($x, $y, $lp))!== false) {
    $pos[] = $lp;
    $lp = $lp + strlen($y);
}

foreach ($pos as $value) {
    echo $value ."\n";
}
}
else
  trigger_error("Stringlenth of y should be less than equal to that of x"."\n",E_USER_ERROR);	
}
else
  trigger_error("Arguments given after file name must be only 2."."\n",E_USER_ERROR);	
?>
