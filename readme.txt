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
11 - Environment created
12 - Environment deleted

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
	'user_id' => $actual_user_id,
	'usertype' => $usertype,
	'handler_id' => $user_id,
	'token' => $token
}
							
		

Fetching data - images and video:
---------------------------------------------------------------------
Example format (json):
{
  "service" : "fetchdata",
  "user_id" : "1",
  "token"    : "=uAP06vmKHj*fTts_S3UY.hRoaJi-kxWG(d1DpbO",
  "environment": "env1",
  "s_id": "4",
  "description": "related description or comment"
}

you will receive this: 

[{"status":"1",
"user_id":"1",
"handler_id":"1",
"usertype":"3",
"token":"1",
"s_id":0}]



Note: Here, if video does not exist, then a value 'null' is given as link.



			
							
