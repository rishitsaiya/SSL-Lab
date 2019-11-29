<?php
if (($_POST["uname"]!="eval") || ($_POST["pword"]!="eva")){
print "Invalid Credentials";
}
else{
header("location: album.php");
}
?>
