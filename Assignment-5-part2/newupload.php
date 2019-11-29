<html>
<head>
<script>
function validate(){
	var x = document.forms["myform"]["fileToUpload"].value;
	var len = x.length;
	var temp = len -4;
	var pos = x.indexOf(".jpg",temp);
	if(pos == -1){
		alert("It should be of .jpg type");
	return false;
	}
	
	else return true;
	</script>
	</head>
	<body>
<form name="myForm" action="upload.php" method="post" onsubmit="return validate()" enctype="multipart/form-data">
	    Select an image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
	<input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
