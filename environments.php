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
		$env_id = $row['env_id'];
		$subquery = "SELECT * FROM ".$tablename." WHERE user_id=$user_id";
		$subresults = mysqli_query($con, $subquery);

		
		while($subrow = mysqli_fetch_array($subresults))
		{
			$s_id = $subrow["s_id"];
			$env_config_id = $subrow["env_config_id"];
			$subquery2 = "SELECT fullname FROM seniors WHERE s_id='$s_id'";
			$subresults2 = mysqli_query($con, $subquery2);

			while($subrow2 = mysqli_fetch_array($subresults2))
			{
				$seniorname = $subrow2['fullname'];
			}
			
			
			echo '<div class="post">';
			echo '<h2>'.$seniorname.'</h2><h4>'.$envname.'</h4> 
			<h4>
			<h6>Senior id: '.$s_id.'</h6>';
			echo '<div class="actionbtns">
			<a href="index.php?pagetype=view&env_id='.$env_id.'&env_config_id='.$env_config_id.'" ><div class="btn btn-primary">View</div></a>
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