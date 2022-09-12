<?php 

	$nrcFile = $_FILES['nrcFile']['name'];
	$imgTmpName =$_FILES['nrcFile']['tmp_name'];
	$imgSize = $_FILES['nrcFile']['size'];
	$imgError = $_FILES['nrcFile']['error'];
	$imgExt = explode('.', $nrcFile);

	$actualFileExt = strtolower(end($imgExt));
	$allowed = array('jpg','jpeg','png','pdf');

	if (in_array($actualFileExt, $allowed)) {
		if ($imgError === 0) {
			if ($imgSize < 500000) {
				$fileDestination = 'images/nrcs/'.$nrcFile;
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
	


 