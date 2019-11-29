<!DOCTYPE html>
<html>

<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename = $_FILES["fileToUpload"]["name"];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$uploadOk = 1;
$total = 0;

if($ext !== 'jpg'){
   echo "Extension must be jpg. <br>";
   $uploadOk = 0;
}

 $maxsize = 0;
   if($dir = opendir("images")){
   while (($file = readdir($dir)) !== false) {
      if ($file == '.' || $file == '..') { 
      	continue; 
      }          
      $maxsize++;
   }
   closedir($dir);
 }

if($maxsize=="10"){
 $uploadOk = 0;
 echo "Only 10 files can be uploaded at maximum." ;
}

if (file_exists($target_file)) {
    echo "File already exists. <br>";
    $uploadOk = 0;
 }
 if ($_FILES["fileToUpload"]["size"] > 204800) {
    echo "File too large, It should be within 200KB. <br>";
    $uploadOk = 0;
 }
 if($total == 10){
  echo "Only 10 images allowed. <br>";
  $uploadOk = 0;
 }
 if ($uploadOk == 0) {
    echo "File was not uploaded. <br>";
 } 

 else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
        $total++;
	} 
	else {
        echo "There was an error uploading your file. <br>";
   }
 }
?> 
</html>
