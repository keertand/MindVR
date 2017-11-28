<?php

include '../../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$token = $obj['token'];



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

	
if(checkuser($user_id, $token))
{	
	if(5>4)
	{
		
		$senior_count = 0;
		$query = "SELECT 1 FROM seniors WHERE user_id='$user_id'";
		$results = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($results))
		{
			$senior_count = $senior_count + 1;
		}
		
		$status = 1;
		$result["status"] = $status;
		$result["description"] = "fetch success!";
		$result["senior_count"] = $senior_count;
		
		
		$seniors_arr = array();
		
		$query = "SELECT * FROM seniors WHERE user_id='$user_id' and flag=1";
		$results = mysqli_query($con, $query);
		$temp_count = 0;
		while($row = mysqli_fetch_array($results))
		{
			$temp_count = $temp_count + 1;
			$temp_s_id = $row['s_id'];
			$temp_s_name = $row['fullname'];
			
			$temp_thisone = array();
			
			$temp_thisone["s_id"] = $temp_s_id;
			$temp_thisone["name"] = $temp_s_name;
			
			
			//array_push($temp_thisone,$temp_s_id);
			//array_push($temp_thisone,$temp_s_name);
			
			array_push($seniors_arr,$temp_thisone);
		}
		
		$result["seniors"] = $seniors_arr;
		
	}
	else
	{
		$status = -1;
		$result["status"] = $status;
		$result["description"] = "access denied!";
		
	}
}
else
{
	$status = -1;
	$result["status"] = $status;
	$result["description"] = "User authentication failure!";

}	

			
							
echo json_encode($result);

?>