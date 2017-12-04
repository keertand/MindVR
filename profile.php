
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
			<input type="text" class="inptxt" placeholder="Senior Details.." name="details" />
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

<div class="modal fade" id="delsenior" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
		
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST" action="delsenior_backend.php">
			<h4>Do you really want to delete the Senior ? </h4>
			<input type="text" class="inptxt sname" placeholder="Senior Name" name="seniorname" readonly /><br>
			<h6>Senior ID:</h6>
			<input type="text" class="inptxt sid" placeholder="Senior id" name="senior_id" readonly /><br>
			<h6>Note: Deleting a senior would automatically delete associated family members.</h6>
			<div class="row">
				<input type="submit" class="btn btn-danger" value="Yes, Delete" />
			</div>
		</form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delfammem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST" action="delfammem_backend.php">
			<h4>Do you really want to delete the Family Member ? </h4>
			<input type="text" class="inptxt sname" placeholder="Senior Name" name="seniorname" readonly /><br>
			<input type="text" class="inptxt sid" placeholder="Senior id" name="senior_id" readonly /><br>
			<input type="text" class="inptxt fam_name" placeholder="Family Member Name" name="fam_name" readonly /><br>
			<input type="hidden" class="inptxt fammem_id" name="familymember_id" readonly /><br>
			<h6>Note: Deleting a Family Member would not effect the senior. You could still add another family member.</h6>
			<div class="row">
				<input type="submit" class="btn btn-danger" value="Yes, Delete" />
			</div>
		</form>
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


<div class="modal fade" id="editfamilymember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span>Edit a Family Member</span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="post" action="editfamily_backend.php">
			<input type="text" class="inptxt" placeholder="FirstName" name="firstname"/><br>
			<input type="text" class="inptxt" placeholder="LastName" name="lastname"/><br>
			<input type="email" class="inptxt" placeholder="Email" name="email" /><br>
			<input type="password" class="inptxt" placeholder="Password" name="password"/><br>
			<input id="edit_fam_id" type="hidden" value="" name="familymember_id" />
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
	
	$query = "SELECT * FROM environments";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		echo '<div class="post">';
		echo '<h2>'.$row["env_name"].'</h2> <h6> '.$row["details"].'</h6>';
		
		echo '</div>';
		
		$count = $count + 1;
	}
	
	
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
		$details = $row['details'];
		$profile = $row['profile'];
		$senior_id = $row['s_id'];
		echo '<div class="post"><div class="row">';
		echo '<h2>'.$seniorname.'</h2></div><h6>Senior id: '.$senior_id.'</h6><br>';
		echo '<p><strong>Senior Details:</strong><br>'.$details.'</p><br>';
		echo '<h6>Family Members</h6>';
		
		$tempcount = 0;
		$subquery = "SELECT * from userdetails where user_id in (SELECT familymember_id FROM familymembers WHERE s_id=".$senior_id." and flag=1)";
		$subresults = mysqli_query($con, $subquery);
		while($subrow = mysqli_fetch_array($subresults))
			{
				$familymember_id = $subrow['user_id'];
				$fam_firstname = $subrow['firstname'];
				$fam_lastname = $subrow['lastname'];
				$fam_email = $subrow['email'];
				$fam_username = $subrow['username']; 
				
				$subquery2 = "SELECT password from userlogin where username ='$fam_username'";
				$subresults2 = mysqli_query($con, $subquery2);
				while($subrow2 = mysqli_fetch_array($subresults2))
					{
						$fam_password = $subrow2['password'];
					}
				
				echo '<ul class="fammem"><li><strong>'.$fam_firstname.' '.$fam_lastname.'</strong></li>	';
				echo '<li>Email: '.$fam_email.'</li>';
				echo '<li>Username: '.$fam_username.'</li>';
				echo '<li>Password: '.$fam_password.'</li>';
				echo '<li><span class="btn btn-primary" data-toggle="modal" data-target="#editfamilymember" >Edit<i class="fa fa-pencil" aria-hidden="true"></i></span>
						<span class="btn btn-danger delfammembtn" data-sname="'.$seniorname.'" data-sid = "'.$senior_id.'" data-famname="'.$fam_firstname.' '.$fam_lastname.'" data-famid = "'.$familymember_id.'" data-toggle="modal" 
						data-target="#delfammem">Delete Member<i class="fa fa-trash" aria-hidden="true"></i></span></li></ul>';
				
				$tempcount++;
			}
		if($tempcount==0)
		{
			echo '<li>No family members added yet.</li>	';
		}
		echo '<div class="row actbtns">
		<a href="index.php?pagetype=environments&s_id='.$senior_id.'&sname='.$seniorname.'"><button class="btn btn-primary">View Environments</button></a>
		<a href="index.php?pagetype=library&s_id='.$senior_id.'"><button class="btn btn-primary">View Library</button></a><button class="btn btn-primary addfambtn" data-toggle="modal" data-s_id="'.$senior_id.'" data-target="#addfamilymember">Add a family member</button>';
		echo '<div class="delbtn">
		<div class="btn btn-danger delseniorbtn" data-sid = "'.$senior_id.'" data-sname="'.$seniorname.'" data-toggle="modal" data-target="#delsenior" >
		Delete Senior <i class="fa fa-trash" aria-hidden="true"></i></div>
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