<?php
session_start();

require "db.php";

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$handler_id = $_SESSION['handler_id'];
$comment = $_POST['vid_comment'];


$activity = "video_upload";
$timestamp = time();
$ip = $_SERVER['REMOTE_ADDR'];

 function addlog($type,$activity,$timestamp,$user_id,$handler_id,$ip,$video_id)
{
	require 'db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,content_id,handler_id,ip) values ($type,'$activity','$timestamp',$user_id,$handler_id,'$video_id','$ip')";
	$results = mysqli_query($con, $query);
}


if (!file_exists("images/user_resources/".$user_id))
{
	mkdir("images/user_resources/".$user_id);
}


$target_dir = "images/user_resources/".$user_id."/".$user_id;
$timestamp = Time();

$target_file = $target_dir."_video_".$timestamp.".". pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
echo "<h1>target: ".$target_file."</h1>";

$uploadOk = 1;
$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
if($videoFileType != "mp4" && $videoFileType != "mpeg" && $videoFileType != "MP4" && $videoFileType != "MPEG") {
    echo "Sorry, only mp4, mpeg files are allowed.";
	echo "<hr>You uploaded : ".$videoFileType;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		$query = "insert into videodb (video_link, user_id, uploaded_by, video_name, uploadedon) values('$target_file','$user_id','$handler_id','$comment',0,'$timestamp')";
		$results = mysqli_query($con, $query);
		echo $results;
		
		$query = "select video_id from imagedb where uploadedon = '$timestamp' and user_id = '$user_id'";
		$results = mysqli_query($con, $query);
		
		while($row = mysqli_fetch_array($results))
		{
			$video_id = $row['video_id'];
		}
		
		echo $query;
		echo "video id: ".$video_id;
		
		addlog(3,$activity,$timestamp,$user_id,$handler_id,$ip,$video_id);
		
		header('Location: index.php?pagetype=library');
		
    } else {
        echo "Sorry, there was an error uploading your file.";
		header('Location: index.php?pagetype=library');
    }
}




?>
