
<?php

include '../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$token = $obj['token'];
$seniorname = $obj['seniorname'];
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
	require "../db.php";
	
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

 function addlog($type,$activity,$timestamp,$user_id,$profileno,$ip)
{
	require '../db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,content_id,ip) values ($type,'$activity','$timestamp',$user_id,$profileno,'$ip')";
	$results = mysqli_query($con, $query);
}
	
	
if(checkuser($user_id, $token))
{	
	$profileno = 1;

	$query = "select profile from seniors where user_id = '$user_id' order by timestamp";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$profileno = $row['profile'];
	}

	$profileno = $profileno + 1;
	
	$query = "INSERT into seniors (user_id, profile, fullname, timestamp, flag) values ('$user_id','$profileno','$seniorname','$timestamp',1)";
	$results = mysqli_query($con, $query);

	addlog(7,$activity,$timestamp,$user_id,$profileno,$ip);

	$status = 1;
	$description = "Senior Added successfully!";
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
	

			
							
echo json_encode($result);

?>