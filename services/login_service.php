
<?php

require '../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$username = $obj['username'];
$password = $obj['password'];
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
	
	
function gentoken($length)
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $token = substr( str_shuffle( $chars ), 10, 10+$length );
    return $token;
}
 
function puttoken($username, $token)
{
	require '../db.php';	
	
	$query = "Update userlogin set token = '$token' WHERE username='$username'";
	$results = mysqli_query($con, $query);
}

function updatetime($timestamp,$user_id)
{
	require '../db.php';	
	
	$query = "Update userlogin set lastlogin = '$timestamp' WHERE user_id='$user_id'";
	$results = mysqli_query($con, $query);
}

function addlog($type,$activity,$timestamp,$user_id,$actual_user_id,$ip)
{
	require '../db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,handler_id,ip) values($type,'$activity','$timestamp',$actual_user_id,$user_id,'$ip')";
	$results = mysqli_query($con, $query);
}
 
$query = "SELECT * FROM userlogin WHERE username='$username'";
$results = mysqli_query($con, $query);

while($row = mysqli_fetch_array($results))
{
	$pass_actual = $row['password'];	
	$usertype = $row['usertype'];
	$user_id = $row['user_id'];
}
	
if($pass_actual==$password)
 {
	 
	 //login successfull!
	$handler_id ="0";
	$actual_user_id = "0";
	
	if($usertype>=2)
	{
		$actual_user_id = $user_id;
		$handler_id = $user_id;
	}
	elseif($usertype==1)
	{
		
		$query = "SELECT * FROM familymembers WHERE familymember_id='$user_id'";
		$results = mysqli_query($con, $query);

		while($row = mysqli_fetch_array($results))
		{	
			$profile = $row['profile'];
			$actual_user_id = $row['user_id'];
		}
		
		$handler_id = $user_id;
	}
	
	$status = '1';
	addlog(1,$activity,$timestamp,$handler_id,$actual_user_id,$ip);
	updatetime($timestamp,$user_id);
	
	$token = gentoken(30); // some random to be generated, so it will act as an identifier.
	puttoken($username,$token);
 }
else
{
	//login failed!
	$status = '-1';
	$actual_user_id = '';
	$usertype ='';
	$handler_id = '';
	$token = '';
}

			$result[] = array(
							'status' => $status,
							'user_id' => $actual_user_id,
							'handler_id' => $user_id,
							'usertype' => $usertype,
							'token' => $token
							);
							
echo json_encode($result);

?>