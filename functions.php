<?php
	function uploadImage() {
		$targetDir = "uploads\\";
		$file_name = $_FILES["uploadImg"]["name"];
		$file_ext = explode('.', $file_name)[1];
		$target_file = $targetDir.basename(md5($file_name.time()).'.'.$file_ext);
		$uploadOK = 1;
		$imgSize = getimagesize($_FILES["uploadImg"]["tmp_name"]);
		if($imgSize !== false) {
			move_uploaded_file($_FILES["uploadImg"]["tmp_name"],$target_file);
			$target_file = str_replace("uploads\\", '', $target_file);
			return $target_file;
		}else{
			return false;
		}
	}
?>