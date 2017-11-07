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
8 - senior deleted
9 - family member added
10 - family member deleted

.. more yet to be added.



Service Link:

link to send to: http://keertandakarapu.com/projects/MindVRMyFamily/services/ultimate_service.php

The link is valid for all the services. The appropriate service is called depending upon the service name

Login service send request format:
---------------------------------------------------------------------

Request format example (json): 

{
    'service'      => 'login',
    'username'    => $username,
    'password'       => $password,
	'ip' => $ip,
    'description' => 'some description'
}


you will receive this: 

{
	'status' => $status,
	'user_id' => $user_id,
	'usertype' => $usertype,
	'token' => $token
}
							
		

Fetching data - images and video:
---------------------------------------------------------------------
Example format (json):

{
    'service'      => 'fetchdata',
    'user_id'    => '1',
    'token'       => '=uAP06vmKHj*fTts_S3UY.hRoaJi-kxWG(d1DpbO',
	'environment' => 'env1',
	'profile' => '1',
    'description' => 'related description or comment'
}


you will receive this: 

{
	'status' => $status,
	'user_id' => $user_id,
	'img_count' => no of images,
	'imgplaceholder1' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},
	'imgplaceholder2' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},					
	'imgplaceholder3' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},
	'imgplaceholder4' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},
	'imgplaceholder5' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},
	'imgplaceholder6' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},
	'imgplaceholder7' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						},
	'imgplaceholder8' => {
						'img_link' => $imglink, 
						'video_link' => $videolink
						}
}

Note: Here, if video does not exist, then a value 'null' is given as link.
			
							