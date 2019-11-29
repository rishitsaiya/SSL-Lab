<html>
<body>
<?php
if($_POST){
 if(isset($_POST['upload'])){ header("location: newupload.php"); }
 if(isset($_POST['delete'])){ header("location: delete.php"); }
 if(isset($_POST['first'])){ process("first"); }
 if(isset($_POST['last'])){ process("last"); }
 if(isset($_POST['next'])){ process("next"); }
 if(isset($_POST['prev'])){ process("prev"); }
}
function process($value){   
 $image = array();
 $maxsize = 0;
   if($dir = opendir("images")){
   while (($file = readdir($dir)) !== false) {
      if ($file == '.' || $file == '..') { continue; }
      $image[$maxsize] = $file;      
      $maxsize++;      
   }
   closedir($dir);
 }
 static $current = 0;
if($maxsize!="0")
{
 if($value=="first") { $current = 0;echo '<img src="images/'.$image[0].'" width="300" height="300"/>'; }
 else if($value=="last") { $current = $maxsize - 1;echo '<img src="images/'.$image[$maxsize - 1].'" width="300" height="300"/>'; }
 else if($value=="prev"){ 
 if($current=="0"){ echo "Beginning of the album <br> <br>"; 
                    echo '<img src="images/'.$image[$current].'" width="300" height="300"/>';}
 else { $current--; echo '<img src="images/'.$image[$current].'" width="300" height="300"/>';}
 }
 else if($value=="next"){
 if($current=="$maxsize - 1"){ echo "End of the album <br> <br> ";
                         echo '<img src="images/'.$image[$current].'" width="300" height="300"/>';}
 else {$current++; echo '<img src="images/'.$image[$current].'" width="300" height="300"/>'; } 
 } 
}
else { echo "No images uploaded to show"; } 
 }
?>
<form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	   	    <input type="submit" name="next" value="next">
		    <input type="submit" name="prev" value="prev">
		    <input type="submit" name="first" value="first">
		    <input type="submit" name="last" value="last">
		    <input type="submit" name="upload" value="upload">
		    <input type="submit" name="delete" value="delete">
</form>
</body>
</html>
