Read me :


in Log file:

type : 

1 - login
2 - signup
3 - imageupload
4 - imagedelete
5 - videoupload
6 - videodelete
7 - senior added
8 - caretaker added
9 - 





Login service send request format:

link to send to: http://keertandakarapu.com/projects/MindVRMyFamily/services/login_service.php 

Request format:

$data = array(
    'service'      => 'login',
    'username'    => $username,
    'password'       => $password,
	'ip' => $ip,
    'description' => 'some description'
);

// convert to json and send.

you will receive this: 

$result[] = array(
							'status' => $status,
							'user_id' => $user_id,
							'usertype' => $usertype,
							'token' => $token
							);
							
		

Fetching data: images and video:

		
$data = array(
    'service'      => 'login',
    'user_id'    => '1',
    'token'       => '=uAP06vmKHj*fTts_S3UY.hRoaJi-kxWG(d1DpbO',
	'environment' => 'env1',
	'profile' => '1',
    'description' => 'some description'
);

// convert to json and send.



			
							