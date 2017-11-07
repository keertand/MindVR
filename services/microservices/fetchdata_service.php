
<?php

include '../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$token = $obj['token'];
$environment = $obj['environment'];
$profile = $obj['profile'];



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

function profileexists($user_id,$profile,$environment)
{
	require "../db.php";
	
	$query = "SELECT 1 FROM ".$environment." WHERE user_id='$user_id' and profile='$profile'";
	$results = mysqli_query($con, $query);
	
	if($results!=NULL)
	{
		return true;
	}
	else return false;
}

	
if(checkuser($user_id, $token))
{	

	if(profileexists($user_id,$profile,$environment))
	{

	$imgidarray = array();
	
	$query = "SELECT * FROM ".$environment." WHERE user_id='$user_id' and profile='$profile'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$count = $row['img_no'];
		
		for($i=3;$i<$count+3;$i++)
		{
			array_push($imgidarray,$row[$i]);
		}
	}
	
	$imglinkarray = array();
	$videolinkarray = array();
	
	for($i=0;$i<count($imgidarray);$i++)
		{
			$temp = $imgidarray[$i];
			$query = "SELECT img_link,videoflag FROM imagedb WHERE img_id='$temp'";
			$results = mysqli_query($con, $query);
			
			while($row = mysqli_fetch_array($results))
			{
				array_push($imglinkarray,$row['img_link']);
				
				if($row['videoflag']=="1")
				{
					$subquery = "SELECT video_link FROM videodb WHERE video_id in ( SELECT video_id from connectedmedia where img_id = '$temp' )";
					$subresults = mysqli_query($con, $subquery);
					
					while($subrow = mysqli_fetch_array($subresults))
					{
						$templink = $subrow['videolink'];
					}
							
					array_push($videolinkarray,$templink);
				}
				else
				{
					array_push($videolinkarray,"null");	
				}
				
			}
			
		}
		
		$status = 1;
		$result[] = array(
							'status' => $status,
							'user_id' => $user_id,
							'img_count' => count($imgidarray)
							);
		
		for($i=0;$i<count($imgidarray);$i++)
		{
		$imgplaceholder = 'img_placeholder_' . (intval($i)+1);
		array_push($result, array($imgplaceholder => array( 'img_link' => $imglinkarray[$i], 'video_link' => $videolinkarray[$i])));
		}
		
		array_push($result,array('description' => 'fetch success!'));

		
	}
	else
	{
		$status = 0;
		$result[] = array(
							'status' => $status,
							'description' => 'Profile does not exist!'
							
							
							);
		
	}
}
else
{
	$status = -1;
	$result[] = array(
							'status' => $status,
							'description' => 'User authentication failure!'
							
							
							);
}	

			
							
echo json_encode($result);

?>