
<?php

include '../../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$senior_id = $obj['senior_id'];

$token = $obj['token'];
$usertype = $obj['usertype'];
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

 function addlog($type,$activity,$timestamp,$user_id,$senior_id,$ip)
{
	require '../../db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,content_id,handler_id,ip) values ($type,'$activity','$timestamp',$user_id,$senior_id,$user_id,'$ip')";
	$results = mysqli_query($con, $query);
	
	return 1;
}
	
	
if(checkuser($user_id, $token) and $usertype>2)
{	
	
	$query = "update seniors set flag = 0 where s_id = ".$senior_id;
	$results = mysqli_query($con, $query);
		
	echo $query;
	
	$query = "update familymembers set flag = 0 where s_id = ".$senior_id;
	$results = mysqli_query($con, $query);
	
	addlog(8,$activity,$timestamp,$user_id,$senior_id,$ip);

	$status = 1;
	 
	$description = "senior removed successfully!";
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