<?php
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$arrlength = count($argv);
function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr \n";
  die();
}

set_error_handler("customError",E_USER_ERROR);
if(strcmp(substr($target_file,strpos($target_file,".")),".txt")==0){
if (filesize($target_file)<2000){
$myfile = fopen($target_file, "r");
$ch=fgetc($myfile);
$str="";
$a=array();
$i=0;

while(!feof($myfile)){
if($ch!=' '){
$str=$str.$ch;
}
else{
$a[$i]=$str;
$i=$i+1;
$str="";
}
$ch=fgetc($myfile);
}
$a[$i]=$str;
for($x = 1; $x < count($a); $x++) {
    $a[$x]=strtolower($a[$x]);
}
$m=array();
$m=$a;
$l=count($a);
for($i=0;$i<count($a);$i++){
	$j=$i;
	$temp=$a[$i];
	for($k=0;$k<count($a);$k++){
		if($j!=$k){
			if($temp==$a[$k]){
				$a[$k]="";
				$l=$l-1;
			}
		}
	}
}
$a[count($a)-1]="";
$i=0;
$arr=array();
for($x=0;$x<count($a);$x++){
	if($a[$x]!=""){
		$arr[$i]=$a[$x];
		$i=$i+1;
	}
}
sort($arr);
$c=0;
echo "<table border=1>
<th>
<td>Word</td>
<td>Frequency</td>
</th>
</table>";
for($x=0;$x<count($arr);$x++) {
	for($y=0;$y<count($m);$y++){
     	if($arr[$x]==$m[$y]){
     		$c=$c+1;
     	}
     }
     echo " <table border=1>
  <tr>
    <td>".$arr[$x]."</td>
    <td>".$c."</td>
  </tr>
</table>" ;
     $c=0;
}
fclose($myfile);
}
else{
	trigger_error("Input file size must be less than 2KB",E_USER_ERROR);
}
}
else{
	trigger_error("Input file should be taken with extension .txt only.",E_USER_ERROR);
}
?>
