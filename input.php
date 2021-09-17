<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Page title</title>
</head>
<style>
</style>
<body>
<?php 
  $target_dir="input";
  $target_file= $target_dir.basename($_FILES["fileToUpload"]["name"]);
  $uploadOk=1; $imageFileType=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
  if(isset($_POST["submit"]))
  $check =getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false){
  echo "the file is image ".$check["mime"]. ".";
  $uploadOk=1;
  }
  else {
  echo "the file is not image";
  $uploadOk=0;
  }
  if(file_exists($target_file)) {
  echo "the file exists ";
  $uploadOk=0;
  }
  if($_FILES["fileToUpload"]["size"] > 500000) {
  echo "file size is big ";
  $uploadOk=1;
  }
  if($imageFileType != "jpg" && $imageFileType != "jpeg" && 
  				$imageFileType != "png" &&
  				$imageFileType != "gif" ) {
  echo "not a type";
  $uploadOk=0;
  }
  if($uploadOk == 0) {
  echo "file not sent ";
  }
  else{
  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  echo "the file ".htmlspecialchars($_FILES["fileToUpload"]["name"])."has been uploaded";
  }
  else{
  	"there was a problem while uploading file";											echo "there was a problem uploading file ";
 }
 ?>
</body>
</html>
