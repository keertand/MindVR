
<?php session_start();?>
<?php


$username = $_POST["username"];
$password = $_POST["password"];


$ip = $_SERVER['REMOTE_ADDR'];

$data = array(
    'service'      => 'login',
    'username'    => $username,
    'password'       => $password,
	'ip' => $ip,
    'description' => 'some description'
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

echo "This is response: ";
var_dump($json_response);

echo '<h1>';
echo $json_response;
echo '</h1>';

if($response["status"]=="1")
{
	$_SESSION['username'] = $username;
	$_SESSION['user_id'] = $response["user_id"];
	$_SESSION['handler_id'] = $response["handler_id"];
	$_SESSION['usertype'] = $response["usertype"];
	$_SESSION['token'] = $response["token"];
	
	echo $response["token"];
	
	if($response["s_id"]!=0)
	{
		$_SESSION['s_id'] = $response["s_id"];
	}
	
	setcookie("username", $username);
	header('Location: index.php?pagetype=home');	
}
else
{
	echo "<h3>Login Failed! Redirecting to login again...</h3>";
	header('Location: index.php?pagetype=login');
}


?>