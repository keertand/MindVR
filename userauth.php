
<?php

require "db.php";

if(isset($_SESSION['username']))
{
$username = $_SESSION['username'];
$usertype = $_SESSION['usertype'];
$user_id = $_SESSION['user_id'];
$token = $_SESSION['token'];

if(isset($_SESSION['s_id']))
{
	$s_id = $_SESSION['s_id'];
	
	$query = "SELECT * FROM seniors WHERE s_id=".$s_id;
	$results = mysqli_query($con, $query);

	
	while($row = mysqli_fetch_array($results))
	{
		$seniorname = $row['fullname'];	
	}
}

}
else
{
	header('Location: index.php?pagetype=login');
}


	
	?>