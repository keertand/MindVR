
<?php

include '../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$username = $obj['username'];
$email = $obj['email'];

function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
	//	return mysqli_real_escape_string($str);
	return $str;
	}

function checkuser($usr)
{
	$query = "SELECT username FROM userlogin";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		if($row['username']==$usr)
			return false;
	}
	return true;
}
	
function checkemail($eml)
{
	$query = "SELECT email FROM userdetails";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		if($row['email']==$eml)
			return false;
	}
	return true;
}

 
 
if(checkuser($username) && checkemail($email
{

$query = "SELECT email FROM userdetails";
$results = mysqli_query($con, $query);

if(results)
{
	$status = '1';
}	
else
{
	$status = '-1';
}
	
}

			$result[] = array(
							'status' => $status,
							'identifier' => $identifier
							);
							
echo json_encode($result);

?>