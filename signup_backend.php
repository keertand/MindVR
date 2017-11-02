<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password1'];
$confirm_password = $_POST['password2'];
$fname= $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];


if($username=="" || $password =="" || $email =="")
{ // User not found, or info not given So, redirect to login_form again.
   header('Location: signup.php');
   exit();
} 


$ip = $_SERVER['REMOTE_ADDR'];


$data = array(
    'service'      => 'signup',
    'username'    => $username,
	'firstname' => $fname,
	'lastname' => $lname,
    'password'       => $password,
	'confirm_password' => $confirm_password,
    'email' => $email,
	'ip' => $ip
);

$content = json_encode($data);

$url = $_SERVER['SERVER_NAME'] . "/MyndVR_MyFamily/MindVRMyFamily/services/signup_service.php";


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


if($response[0]["status"]=="1")
{
	setcookie("username", $username);
	header('Location: index.php?pagetype=login');	
}
else
{
	header('Location: index.php?pagetype=signup');	
}

?>