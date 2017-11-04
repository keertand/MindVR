
<?php

include '../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$token = $obj['token'];
$seniorname = $obj['profile'];
$ip = $obj['ip'];

$firstname = $obj['firstname'];
$lastname = $obj['lastname'];
$email = $obj['email'];
$password = $obj['password'];
$profile = $obj['profile'];

$timestamp = time();


$familymember_id = $user_id.'_'.$timestamp;

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
	
	return 1;
}
	
	
if(checkuser($user_id, $token))
{	
	
	$query = "Insert into userlogin(username,password,usertype,token,lastlogin,flag) values ('$familymember_id','$password',1,'0','0',1)";
	$results = mysqli_query($con, $query);
	

	$query = "select user_id from userlogin where username='$familymember_id'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$fam_user_id = $row['user_id'];
	}
	
	$query = "Insert into userdetails (user_id,username,firstname,lastname,email,createdon) values ('$fam_user_id','$familymember_id','$firstname','$lastname','$email','$timestamp')";
	$results = mysqli_query($con, $query);

	
	$query = "INSERT into familymembers(user_id,profile,familymember_id,timestamp,flag) values ($user_id,$profile,$fam_user_id,'$timestamp',1)";
	$results = mysqli_query($con, $query);

	
	$query = "select family_addition_id from familymembers where familymember_id='$fam_user_id' and user_id='$user_id'";
	$results = mysqli_query($con, $query);

	$family_addition_id = "";
	
	while($row = mysqli_fetch_array($results))
	{
		$family_addition_id = $row['family_addition_id'];
	}
	
	addlog(9,$activity,$timestamp,$user_id,$family_addition_id,$ip);

	$status = 1;
	 
	$description = "family member Added successfully!";
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