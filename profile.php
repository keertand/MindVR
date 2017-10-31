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


<div class="modal fade" id="addcaretaker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span>Add a CareTaker</span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form>
			<h6>Adding care taker for</h6>
			<select class="inptxt">
				
				<?php
				$query = "SELECT * FROM seniors WHERE user_id='$user_id' and flag=1";
				$results = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($results))
				{
					$seniorname = $row['fullname'];
					$profileno = $row['profile'];
				
				echo '<option value="'.$profileno.'">'.$seniorname.'</option>';
				
				}				
				?>
				
			</select><br>
			<h6>Care taker details</h6>
			<input type="text" class="inptxt" placeholder="FirstName" /><br>
			<input type="text" class="inptxt" placeholder="LastName" /><br>
			<input type="email" class="inptxt" placeholder="Email" /><br>
			<input type="password" class="inptxt" placeholder="Password" /><br>
			<input type="password" class="inptxt" placeholder="Retype Password" /><br>
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

<div class="row">
<?php

$count = 0;

echo '<h2>Seniors</h2>';
	
	$query = "SELECT * FROM seniors WHERE user_id='$user_id' and flag=1";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$seniorname = $row['fullname'];
		
		echo '<div class="post"><div class="row">';
		echo '<h4>'.$seniorname.'</h4>';
		echo '<div class="delbtn">
		<div class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></div>
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
	
<div class="row">
<?php

$count = 0;

echo '<h2>CareTakers</h2>';
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
		echo 'You don\'t have any CareTakers listed yet.<br><br><button class="btn btn-primary" data-toggle="modal" data-target="#addcaretaker">Add a caretaker now</button>';
		echo '</div>';
	}
	
?>
</div>
</div>
</div>