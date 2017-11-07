<?php
session_start();

require "db.php";

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$handler_id = $_SESSION['handler_id'];
$comment = $_POST['imgcomment'];
$s_id = $_POST['s_id'];

$activity = "image_upload";
$timestamp = time();
$ip = $_SERVER['REMOTE_ADDR'];

 function addlog($type,$activity,$timestamp,$user_id,$handler_id,$ip,$image_id)
{
	require 'db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,content_id,handler_id,ip) values ($type,'$activity','$timestamp',$user_id, $image_id, $handler_id,'$ip')";
	$results = mysqli_query($con, $query);
}


if (!file_exists("images/user_resources/".$user_id))
{
	mkdir("images/user_resources/".$user_id);
}


$target_dir = "images/user_resources/".$user_id."/".$user_id;
$timestamp = Time();

$target_file = $target_dir."_image_".$timestamp.".". pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
echo "<h1>target: ".$target_file."</h1>";

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "JPEG") {
    echo "Sorry, only JPG, JPEG files are allowed.";
	echo "<hr>You uploaded : ".$imageFileType;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		$query = "insert into imagedb (img_link, user_id, s_id, uploaded_by, img_name, videoflag, uploadedon) values('$target_file','$user_id','$s_id','$handler_id','$comment',0,'$timestamp')";
		$results = mysqli_query($con, $query);
		echo $results;
		
		$query = "select img_id from imagedb where uploadedon = '$timestamp' and user_id = '$user_id'";
		$results = mysqli_query($con, $query);
		
		while($row = mysqli_fetch_array($results))
		{
			$image_id = $row['img_id'];
		}
		
		echo $query;
		echo "image id: ".$image_id;
		
		addlog(3,$activity,$timestamp,$user_id,$handler_id,$ip,$image_id);
		
		header('Location: index.php?pagetype=library');
		
    } else {
        echo "Sorry, there was an error uploading your file.";
		header('Location: index.php?pagetype=library');
    }
}




?>
