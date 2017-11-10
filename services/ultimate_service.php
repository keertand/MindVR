
<?php


$obj = file_get_contents('php://input');
$obj_decoded = json_decode($obj, TRUE );

$service = $obj_decoded['service'];
$timestamp = time();
$flag = false;
$url = "";

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$links = explode("/",$actual_link);
array_pop($links);

$actual_link = implode("/",$links);


if($service=="login")
{
	$url = $actual_link . "/microservices/login_service.php";
	$flag = true;	
}
elseif($service=="signup")
{
	$url = $actual_link . "/microservices/signup_service.php";
	$flag = true;		
}
elseif($service=="addsenior")
{
	$url = $actual_link . "/microservices/addsenior_service.php";
	$flag = true;		
}
elseif($service=="delsenior")
{
	$url = $actual_link . "/microservices/delsenior_service.php";
	$flag = true;		
}
elseif($service=="addfamilymember")
{
	$url = $actual_link . "/microservices/addfamilymember_service.php";
	$flag = true;		
}
elseif($service=="delfamilymember")
{
	$url = $actual_link . "/microservices/delfamilymember_service.php";
	$flag = true;		
}
elseif($service=="fetchdata")
{
	$url = $actual_link . "/microservices/fetchdata_service.php";
	$flag = true;		
}
elseif($service=="delmedia")
{
	$url = $actual_link . "/microservices/delmedia_service.php";
	$flag = true;		
}


if($flag)
{
	
	$content = $obj;

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);


	if (!( $status == 201 || $status == 200) ){
		echo "Error: call to URL $url failed with status $status, response $json_response, curl_errno " . curl_errno($curl);
	}


	curl_close($curl);

	echo $json_response;

}
else{
	$result[] = array(
					'status' => 'unknown service request',
					);
					
echo json_encode($result);

}



?>