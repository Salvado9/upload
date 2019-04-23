
3 sec file upload project<br>
$file = new file_upload();<br>
$arry = array("format" => "PNG|JPG|JPEG|GIF","name" => substr(md5(rand(0,9999)), rand(0,15), rand(16,35)),"file" => "save file  'img/'","max_size" => "bayt type 512000");<br>
$file->sistem($_FILES,$arry,function ($back){<br>
&nbsp;if ($back["scode"] == "0"){<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo "file upload success!";<br>
&nbsp;}else{<br>
&nbsp;&nbsp;&nbsp;&nbsp;echo $back["msg"];<br>
&nbsp;}<br>
});
