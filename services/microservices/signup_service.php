
<?php

include '../../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$firstname= $obj['firstname'];
$lastname= $obj['lastname'];
$username = $obj['username'];
$password = $obj['password'];
$confirm_password = $obj['confirm_password'];
$email = $obj['email'];
$ip = $obj['ip'];


$activity = $service;
$timestamp  = time();

function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
	//	return mysqli_real_escape_string($str);
	return $str;
	}

function checkuser($username)
{
	require "../../db.php";
	
	$query = "SELECT 1 FROM userlogin where username='$username'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
			return false;
	}
	return true;
}
	
function checkemail($email)
{
	require "../../db.php";

	$query = "SELECT 1 FROM userdetails where email ='$email'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
			return false;
	}
	return true;
}

 function addlog($type,$activity,$timestamp,$user_id,$ip)
{
	require '../../db.php';
	
	$query = "Insert into logfile (type,activity,timestamp,user_id,ip) values ($type,'$activity','$timestamp',$user_id,'$ip')";
	$results = mysqli_query($con, $query);
}
 
if(checkuser($username) && checkemail($email) && $password==$confirm_password)
{

//insert into user login and userdetails
$query = "INSERT INTO userlogin (username,password,usertype,flag) VALUES ('$username','$password',2,0)";
$results = mysqli_query($con, $query);


echo $query;

// get created user_id
$query = "select user_id from userlogin where username = '$username'";
$results = mysqli_query($con, $query);

while($row = mysqli_fetch_array($results))
	{
		$user_id = $row['user_id'];
	}

$query = "Insert into userdetails (user_id,username,firstname,lastname,email,createdon) values ('$user_id','$username','$firstname','$lastname','$email','$timestamp')";
$results = mysqli_query($con, $query);

	$status = '1';
	// insert into logfile
	
	addlog(2,$activity,$timestamp,$user_id,$ip);
	$identifier = 'signup successfull!';
}
else
{
	$status = '-1';
	$identifier = 'User already exists or password mismatch!';
}

			$result[] = array(
							'status' => $status,
							'identifier' => $identifier
							);
							
echo json_encode($result);

?>