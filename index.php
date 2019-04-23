<?php


class file_upload {
    static function sistem($FILES,$saves,callable $callback) {
		if (strripos($saves["format"], strtolower(pathinfo($FILES["fileToUpload"]["name"],PATHINFO_EXTENSION))) === false) {
			$callback(array("status" => "error","scode" => "3","msg" => "format error!"));
		}else{
			if ($_FILES["fileToUpload"]["size"] > $saves["max_size"]){
			    $callback(array("status" => "error","scode" => "2","msg" => "max size error!"));
			}else{
		    	if (!copy($FILES["fileToUpload"]["tmp_name"], $saves["file"].(isset($saves["name"]) == 1 ? ($saves["name"].".".strtolower(pathinfo($FILES["fileToUpload"]["name"],PATHINFO_EXTENSION))):($FILES["fileToUpload"]["name"])))) {
		    		$callback(array("status" => "error","scode" => "1","msg" => "copy error!"));
		    	}else{
		    		$callback(array("status" => "success","scode" => "0"));
		    	}
			}
		}
    }
}

if ($_FILES) {
	$file = new file_upload();
	$arry = array("format" => "PNG|JPG|JPEG|GIF","name" => substr(md5(rand(0,9999)), rand(0,15), rand(16,35)),"file" => "aaa/","max_size" => "512000");


	
	$file->sistem($_FILES,$arry,function ($back){


		if ($back["scode"] == "0"){
			echo "Dosya BaŞARIYLA Yüklendi!";
		}else{
			echo $back["msg"];
		}




	});
}


?>



<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
