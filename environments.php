<?php 

include "userauth.php";

?>

<div class="below">

<div class="modal fade" id="createenv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span>Create an Environment</span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST" action="createenv_backend.php">
			<label>Senior</label>
			<select name="s_id">
			
			 
			<?php
			
			
			if($usertype>=2)
			{
				// get all seniors under this user/caregiver.
				
				$query = "SELECT * FROM seniors WHERE user_id=$user_id and flag=1";
				$results = mysqli_query($con, $query);
				
				while($row = mysqli_fetch_array($results))
				{
					$s_id = $row['s_id'];
					$seniorname = $row['fullname'];
					
					echo '<option value="'.$s_id.'">'.$seniorname.'</option>';
				}
							
			}
			else
			{
				$s_id = $_SESSION['s_id'];
				echo '<option value="'.$s_id.'">'.$seniorname.'</option>';
			}
			
			?>
			</select>
		
			<br>
			<label>Environment </label>
			
			<select name="env">
			<?php
			
				$query = "SELECT * FROM environments";
				$results = mysqli_query($con, $query);
				
				while($row = mysqli_fetch_array($results))
				{
					$current_env_id = $row['env_id'];
					$current_env_name = $row['env_name'];
					
					echo '<option value="'.$current_env_id.'">'.$current_env_name.'</option>';
				}
			
			?>
			</select>
			
			<div class="row">
				<input type="submit" class="btn btn-primary" value="Create" />
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delenv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span class="modalimgcmnt">Do you really want to delete the Environment? </span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body delenv">
      
		<form method="POST" action="delenv_backend.php">
					
					<h6>Environment ID</h6>
					<input type="text" class="inptxt env_config_id" placeholder="Senior id" name="env_config_id" readonly /><br>
					<input type="text" class="inptxt env_id" placeholder="Senior id" name="env_id" hidden readonly />
					<br>
					<h6>Environment Name:</h6>
					<input type="text" class="inptxt envname" placeholder="Senior id" name="environmentname" value="" readonly /><br>
					<br>
					<h6>Senior ID</h6>
					<input type="text" class="inptxt s_id" placeholder="Senior id" name="s_id" value="" readonly /><br>
					<br>
					<h6>Senior Name</h6>
					<input type="text" class="inptxt seniorname" placeholder="Senior id" name="senior_Name" value="" readonly /><br>
					<br>
					<br>
					<h6>Note: Deleting an environment will not delete the pictures associated with it.</h6>
					
					<div class="row">
						<input type="submit" class="btn btn-danger" value="Yes, Delete" />
					</div>
					
				</form>
      </div>
    </div>
  </div>
</div>






<div class="row Environments">

<?php

$count = 0;

echo '<h2>Your Environments</h2>';
	
	$query = "SELECT * FROM environments where flag =1";
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$envname = $row['env_name'];
		$tablename = $row['tablename'];
		$env_id = $row['env_id'];
		
		$subquery = "SELECT * FROM ".$tablename." WHERE user_id=$user_id and flag =1";
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
			<a href="index.php?pagetype=edit&env_id='.$env_id.'&env_config_id='.$env_config_id.'" ><div class="btn btn-primary">Edit</div></a>
			<div class="btn btn-danger delenvbtn" data-toggle="modal" data-target="#delenv" data-envconfigid="'.$env_config_id.'" data-envname="'.$envname.'" data-envid="'.$env_id.'" data-sname="'.$seniorname.'" data-sid="'.$s_id.'">Delete</div>
			</div>';
			echo '</div>';
			
			$count = $count + 1;
		}
	}
	
	
	if($count==0)
	{
		echo '<div class="post">';
		echo 'You don\'t have any environments yet.<br><button class="btn btn-primary" data-toggle="modal" data-target="#createenv">Create one now</button>';
		echo '</div>';
	}
	else
	{
			echo '<button class="btn btn-primary" data-toggle="modal" data-target="#createenv">Create Environment</button>';
	}
	

?>

	
	

</div>
</div>