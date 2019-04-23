# upload
3 sec file upload project
$file = new file_upload();
$arry = array("format" => "PNG|JPG|JPEG|GIF","name" => substr(md5(rand(0,9999)), rand(0,15), rand(16,35)),"file" => "save file  'img/'","max_size" => "bayt type 512000");
$file->sistem($_FILES,$arry,function ($back){
	if ($back["scode"] == "0"){
		echo "Dosya BaŞARIYLA Yüklendi!";
	}else{
		echo $back["msg"];
	}
});
