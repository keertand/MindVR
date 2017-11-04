<?php 

include "userauth.php";

?>

<div class="below">

<div class="row Environments">

<?php

$envname = "The Living Room";
$count = 0;

echo '<h2>Your Environments</h2>';
	
	$query = "SELECT * FROM environments";
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$envname = $row['env_name'];
		$tablename = $row['tablename'];
	
		$subquery = "SELECT * FROM ".$tablename." WHERE user_id=$user_id";
		$subresults = mysqli_query($con, $subquery);

		
		while($subrow = mysqli_fetch_array($subresults))
		{
			$profile = $subrow["profile"];
			
			$subquery2 = "SELECT s_id,fullname FROM seniors WHERE user_id='$user_id' and profile='$profile'";
			$subresults2 = mysqli_query($con, $subquery2);

			while($subrow2 = mysqli_fetch_array($subresults2))
			{
				$senior_id = $subrow2['s_id'];
				$seniorname = $subrow2['fullname'];
			}
			
			
			echo '<div class="post">';
			echo '<h2>'.$seniorname.'</h2><h4>'.$envname.'</h4> 
			<h4>
			<h6>Senior id: '.$senior_id.'</h6>';
			echo '<div class="actionbtns">
			<div class="btn btn-primary">View</div>
			<div class="btn btn-primary">Edit</div>
			<div class="btn btn-primary">Delete</div>
			</div>';
			echo '</div>';
			
			$count = $count + 1;
		}
	
	}
	
	
	if($count==0)
	{
		echo '<div class="post">';
		echo 'You don\'t have any environments yet.<br><button class="btn btn-primary">Create one now</button>';
		echo '</div>';
	}
	else
	{
			echo '<button class="btn btn-primary">Create Environment</button>';
	}
	

?>

	
	

</div>
</div>