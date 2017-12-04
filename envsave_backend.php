
<?php session_start();?>
<?php

require "userauth.php";


$env_id = $_POST['env_id'];
$env_config_id = $_POST['env_config_id'];


$img_no = $_POST['imgno'];

$ip = $_SERVER['REMOTE_ADDR'];

$data = array(
    'service'      => 'envsave',
    'user_id'    => $user_id,
	'env_id' => $env_id,
	'env_config_id' => $env_config_id,	
    'token'       => $token,
	'handler_id' => $handler_id,
	'img_no' => $img_no,
	'ip' => $ip,
    'description' => 'Save Environment'
);


for($i=1;$i<=$img_no;$i++)
{
	$data['placeholder_'.$i] = $_POST['placeholder_'.$i];
}

for($i=1;$i<=$img_no;$i++)
{
	$data['placeholder_vid_'.$i] = $_POST['placeholder_vid_'.$i];
}

var_dump($data);


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
header('Location: index.php?pagetype=view&env_id='.$env_id.'&env_config_id='.$env_config_id);



?>