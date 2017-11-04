
<?php 

include "userauth.php";

?>

<div class="below">

<div class="modal fade" id="addsenior" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span>Add a senior</span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST" action="addsenior_backend.php">
			<input type="text" class="inptxt" placeholder="Senior Name" name="seniorname" />
			<div class="row">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addfamilymember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span>Add a Family Member</span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="post" action="addfamily_backend.php">
			<h6>Create a Family Member</h6>
			<input type="text" class="inptxt" placeholder="FirstName" name="firstname"/><br>
			<input type="text" class="inptxt" placeholder="LastName" name="lastname"/><br>
			<input type="email" class="inptxt" placeholder="Email" name="email" /><br>
			<input type="password" class="inptxt" placeholder="Password" name="password"/><br>
			<input id="addingto" type="hidden" value="" name="addingto" />
			<div class="row">
			<input type="submit" class="btn btn-primary" value="Add" />
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
		
		
      </div>
    </div>
  </div>
</div>

<div class="row profile">

<?php

$count = 0;

echo '<h2>Available Environments</h2>';
	/*
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
	*/
	
	if($count==0)
	{
		echo '<div class="post">';
		echo 'You don\'t have any environments available yet.';
		echo '</div>';
	}
	

?>


<?php

$count = 0;

echo '<h2>Seniors</h2>';
	
	$query = "SELECT * FROM seniors WHERE user_id='$user_id' and flag=1";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$seniorname = $row['fullname'];
		$profile = $row['profile'];
		
		echo '<div class="post"><div class="row">';
		echo '<h4>'.$seniorname.'</h4></div><br>';
		echo '<h6>Family Members</h6>';
		
		$tempcount = 0;
		$subquery = "SELECT * from userdetails where user_id in (SELECT familymember_id FROM familymembers WHERE user_id='$user_id' and profile='$profile' and flag=1)";
		$subresults = mysqli_query($con, $subquery);
		while($subrow = mysqli_fetch_array($subresults))
			{
				$firstname = $subrow['firstname'];
				$lastname = $subrow['lastname'];
				$email = $subrow['email'];
				$username = $subrow['username']; 
				
				echo '<ul class="fammem"><li><strong>'.$firstname.' '.$lastname.'</strong></li>	';
				echo '<li>Email: '.$email.'</li>';
				echo '<li>Username: '.$username.'</li></ul>';
				
				$tempcount++;
			}
		if($tempcount==0)
		{
			echo '<li>No family members added yet.</li>	';
		}
		echo '<div class="row actbtns"><button class="btn btn-primary addfambtn" data-toggle="modal" data-profile="'.$profile.'" data-target="#addfamilymember">Add a family member</button>';
		echo '<div class="delbtn">
		<div class="btn btn-danger">Delete Senior <i class="fa fa-trash" aria-hidden="true"></i></div>
		</div></div>';
		echo '</div>';
		
		$count = $count + 1;
	}
	
	if($count==0)
	{
		echo '<div class="post">';
		echo 'You don\'t have any seniors listed yet.<br><br><button class="btn btn-primary" data-toggle="modal" data-target="#addsenior">Add a senior now</button>';
		echo '</div>';
	}
	else
	{
		echo '<br><br><button class="btn btn-primary" data-toggle="modal" data-target="#addsenior">Add another senior</button>';
	}
	

?>

	

</div>
</div>