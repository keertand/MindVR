
<?php

ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

$data = array(
    'service'      => 'login',
    'user_id'    => '1',
    'token'       => '=uAP06vmKHj*fTts_S3UY.hRoaJi-kxWG(d1DpbO',
	'environment' => 'env1',
	'profile' => '1',
    'description' => 'some description'
);


/*
$service = $obj['service'];
$username = $obj['username'];
$token = $obj['token'];
$environment = $obj['environment'];
$profile = $obj['profile'];

*/

//we can add more things like ip from which this request is coming and all.

$url = $_SERVER['SERVER_NAME'] . "/MyndVR_MyFamily/services/fetchdata_service.php";

echo '<h1>URL: ' . $url . '</h1>';
    
$content = json_encode($data);

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

$response = json_decode($json_response, true);

echo "This is response decoded: ";
var_dump($response);

echo json_last_error_msg();

if($response[0]["status"]=="1")
{	
echo "<h1>Success!</h1>";	
}
else
{
	echo "<h3>Login Failed! Redirecting to login again...</h3>";

}


?>