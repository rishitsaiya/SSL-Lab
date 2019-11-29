<!DOCTYPE html>
<html>
<?php

 if(isset($_POST['submit']))
{ 
 $name = $_POST['text'];
 $string = "images/$name" ;
 if(file_exists($string)){echo "deleted successfully"; unlink($string); }
 else { echo "Sorry, the file does not exist";}
}

//$_SERVER['DOCUMENT_ROOT'].

?>

<body>
<form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
 Name of image to be deleted: <input type="text" name="text"><br>
 <input type="submit" name="submit" value="submit">

</form>
</body>
</html>
