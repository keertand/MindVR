
<?php

include '../../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$env_id = $obj['env_id'];
$usertype = $obj['usertype'];
$user_id = $obj['user_id'];
$token = $obj['token'];
$handler_id = $obj['handler_id'];

$s_id = $obj['s_id'];

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
	

if(checkuser($user_id, $token))
{	
	$profileno = 1;
	$envtable = '';

	$query = "select tablename from environments where env_id = '$env_id'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$envtable = $row['tablename'];
	}

	if($usertype>=2)
		$flag = 1;
	else
		$flag = 0;
		
	$query = "INSERT into $envtable (user_id, s_id, flag, timestamp) values ($user_id,$s_id,$flag,'$timestamp')";
	$results = mysqli_query($con, $query);

	echo $query;
	echo $results;
	
	
	$query = "select env_config_id from $envtable where user_id = $user_id and s_id=$s_id and timestamp = $timestamp";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$envconfigid = $row['env_config_id'];
	}
	
	addlog(11,$activity,$timestamp,$user_id,$envconfigid,$handler_id,$ip);

	$status = 1;
	$description = "Environment created successfully!";
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