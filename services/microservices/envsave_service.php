
<?php

include '../../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$token = $obj['token'];
$handler_id = $obj['handler_id'];
$env_id = $obj['env_id'];
$env_config_id = $obj['env_config_id'];

$img_no = $obj['img_no'];

$imgarray = [];

$videoarray = [];

for($i=1;$i<=$img_no;$i++)
{
	array_push($imgarray,$obj['placeholder_'.$i]);
}

for($i=1;$i<=$img_no;$i++)
{
	array_push($videoarray,$obj['placeholder_vid_'.$i]);
}


$ip = $obj['ip'];

$timestamp = time();

$activity = $service;

function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
	//	return mysqli_real_escape_string($str);
	return $str;
	}


function checkuser($user_id, $token)
{
	require "../../db.php";
	
	$query = "SELECT token FROM userlogin WHERE user_id='$user_id'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$temp = $row['token'];
	}
	
	if($temp==$token)
		return true;
	else 
		return false;
}

 function addlog($type,$activity,$timestamp,$user_id,$profileno,$handler_id,$ip)
{
	require '../../db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,content_id,handler_id,ip) values ($type,'$activity','$timestamp',$user_id,$profileno,$handler_id,'$ip')";
	$results = mysqli_query($con, $query);
}
	

if(checkuser($handler_id, $token))
{	

	$query = "select tablename from environments where env_id = $env_id";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$tablename = $row['tablename'];
	}
	
	
	$existingimg = [];
	
	$query = "select * from $tablename where env_config_id=$env_config_id";
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$img_no = $row['img_no'];
		for($i=1;$i<=$img_no;$i++)
		{
			array_push($existingimg,$row['img_placeholder_'.$i]);
		}
	}
	
	$imgstring = implode(",",$existingimg);
	
	$query = "update imagedb set currentlyused = currentlyused - 1 where img_id in (".$imgstring.")";
	$results = mysqli_query($con, $query);
	
	
	$updation = "";
	for($i=1;$i<=$img_no;$i++)
	{
		$updation .= 'img_placeholder_'.$i.' = '.$imgarray[$i-1].' ,';
	}
	
	$query = "update $tablename set ".$updation." timestamp='$timestamp', flag = 0 where env_config_id = $env_config_id";
	$results = mysqli_query($con, $query);

	$imgstring = implode(",",$imgarray);
	echo $imgstring;
	
	$query = "update imagedb set currentlyused = currentlyused + 1 where img_id in (".$imgstring.")";
	$results = mysqli_query($con, $query);

	
	
	// update connected media
		
	$query = "delete from connectedmedia where env_id=$env_id and env_config_id=$env_config_id";
	$results = mysqli_query($con, $query);
	
	for($i=1;$i<=$img_no;$i++)
	{
		$vid_id = $videoarray[$i-1];
		if($vid_id!=0)
		{	
			$query = "insert into connectedmedia (env_id,env_config_id,img_placeholder,video_id) values($env_id,$env_config_id,$i,$vid_id)";
			$results = mysqli_query($con, $query);
		}
	}
	
	
	addlog(12,$activity,$timestamp,$user_id,$env_config_id,$handler_id,$ip);

	$status = 1;
	$description = "Environment saved!";
}
else
{
	$status = -1;
	$description = "User authentication Failure!";
}

	$result[] = array(
							'status' => $status,
							'description' => $description
							
							);
							
echo json_encode($result,  JSON_FORCE_OBJECT);

?>