<?php 

include "userauth.php";

?>

<div class="below">

<div class="row Environments">

<?php

$envname = "The Living Room";
$count = 0;

echo '<h2>Your Environments</h2>';
	
	$query = "SELECT * FROM env1 WHERE user_id='$user_id'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		echo '<div class="post">';
		echo '<h2>'.$envname.'</h2> <h2>Profile: '.$row["profile"].'</h2>';
		echo '<div class="actionbtns">
		<div class="btn btn-primary">View</div>
		<div class="btn btn-primary">Edit</div>
		<div class="btn btn-primary">Delete</div>
		</div>';
		echo '</div>';
		
		$count = $count + 1;
	}
	
	if($count==0)
	{
		echo '<div class="post">';
		echo 'You don\'t have any environments yet.<br><button class="btn btn-primary">Create one now</button>';
		echo '</div>';
	}
	

?>

	
	

</div>
</div>