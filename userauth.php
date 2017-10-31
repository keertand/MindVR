
<?php

if(isset($_SESSION['username']))
{
$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user_id = $_SESSION['user_id'];
$token = $_SESSION['token'];
}
else
{
	header('Location: index.php?pagetype=login');
}


	
	?>