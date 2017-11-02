
<?php session_start();?>
<?php


$username = $_POST["username"];
$email = $_POST["email"];



$data = array(
    'service'      => 'resetpw',
    'username'    => $username,
    'email'       => $email,
    'description' => 'some description'
);

//we can add more things like ip from which this request is coming and all.

$url = $_SERVER['SERVER_NAME'] . "/MyndVR_MyFamily/services/resetpw_service.php";

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

echo '<h1>';
//echo $json_response;
echo $response[0]["status"];
echo $response[0]["identifier"];
echo '</h1>';

if($response[0]["status"]=="1")
{
	echo "A temporary password has been sent to your Email";	
	header('Location: index.php?pagetype=resetpw.php');	
	// How to implement here?
}
else
{
	echo "<h3>Username/Email not exist or match!</h3>";
	header('Location: index.php?pagetype=resetpw.php');
}


?>