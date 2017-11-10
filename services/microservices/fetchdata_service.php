<?php

include '../../db.php';

$obj = file_get_contents('php://input');
$obj = json_decode($obj, TRUE );

$service = $obj['service'];
$user_id = $obj['user_id'];
$token = $obj['token'];
$environment = $obj['environment'];
$s_id = $obj['s_id'];



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

function profileexists($user_id,$s_id,$environment)
{
	require "../../db.php";
	
	$query = "SELECT 1 FROM ".$environment." WHERE user_id='$user_id' and s_id='$s_id'";
	$results = mysqli_query($con, $query);
	
	if($results!=NULL)
	{
		return true;
	}
	else return false;
}

	
if(checkuser($user_id, $token))
{	

	if(profileexists($user_id,$s_id,$environment))
	{

	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

	$prior_link = $actual_link.'/MyndVRMyFamily/';



	$imgidarray = array();
	
	$query = "SELECT * FROM ".$environment." WHERE user_id='$user_id' and s_id='$s_id'";
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
				array_push($imglinkarray,$prior_link.$row['img_link']);
				
				if($row['videoflag']=="1")
				{
					$subquery = "SELECT video_link FROM videodb WHERE video_id in ( SELECT video_id from connectedmedia where img_id = '$temp' )";
					$subresults = mysqli_query($con, $subquery);
					
					while($subrow = mysqli_fetch_array($subresults))
					{
						$templink = $prior_link.$subrow['videolink'];
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
		
		$result["status"] = $status;
		$result["user_id"] = $user_id;
		$result["img_count"] = count($imgidarray);
							
		
		for($i=0;$i<count($imgidarray);$i++)
		{
			$imgplaceholder = "img_placeholder_" . (intval($i)+1);
			
			$temp1 = $imglinkarray[$i];
			$temp2 = $videolinkarray[$i];
			//$image_list["img_link_".(intval($i)+1)] = $temp1;
			//$image_list["video_link_".(intval($i)+1)] = $temp2;
			
			$temparr = array('img_link'=> $temp1, 'video_link' => $temp2);
			$image_list["placeholder_".(intval($i)+1)] = $temparr;
		}
		
		$result["image_list"] = $image_list;		
		$result["description"] = "fetch success!";

	}
	else
	{
		$status = 0;
		$result["status"] = $status;
		$result["description"] = "Senior profile does not have an active environment!";
		
	}
}
else
{
	$status = -1;
	$result["status"] = $status;
	$result["description"] = "User authentication failure!";

}	

			
							
echo json_encode($result, JSON_FORCE_OBJECT);

?>