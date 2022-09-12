<?php 

	$profilePicture = $_FILES['profilePicture']['name'];
	$imgTmpName =$_FILES['profilePicture']['tmp_name'];
	$imgSize = $_FILES['profilePicture']['size'];
	$imgError = $_FILES['profilePicture']['error'];
	$imgExt = explode('.', $profilePicture);

	$actualFileExt = strtolower(end($imgExt));
	$allowed = array('jpg','jpeg','png','pdf');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 500000) {
				$fileDestination = 'images/portraits/'.$profilePicture;
				move_uploaded_file($imgTmpName, $fileDestination);
			} else {
				echo "file size is too big";
			}
		}else{
			echo "error while uploading your file";
		}
	}else {
			echo "you cannot upload files of this type";
	}
	


 