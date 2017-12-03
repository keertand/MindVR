
<?php session_start();?>
<?php

require "userauth.php";

$current_user_id = $_GET['flag1'];


$ip = $_SERVER['REMOTE_ADDR'];

$data = array(
    'service'      => 'approveuser',
    'user_id'    => $user_id,
	'current_user_id' => $current_user_id,
    'token'       => $token,
	'handler_id' => $handler_id,
	'ip' => $ip,
    'description' => 'Approve user'
);

//we can add more things like ip from which this request is coming and all.

$url = $_SERVER['SERVER_NAME'] . "/MyndVRMyFamily/services/ultimate_service.php";

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

var_dump($json_response);

echo $response;
header('Location: index.php?pagetype=home');



?>