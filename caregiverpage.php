	<div class="col">


	<h1>Caregiver Portal
	<?php echo 'Hello : '.$username;?></h1><br>
	
	<div class="row">
		<h4>Existing caregivers and their data</h4>
		
		 <table class="table table-striped">
    <thead>
      <tr>
	    <th>Username</th>
        <th>Usertype</th>
		<th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		<th>No of seniors</th>
		<th>Total no of familymembers</th>
		<th>Actions</th>
      </tr>
    </thead>
    <tbody>
      
	 <?php
	  
	  
		$query = "Select * from userlogin natural join userdetails";
		$results = mysqli_query($con, $query);
	
		while($row = mysqli_fetch_array($results))
		{
			$dis_user_id = $row['user_id'];
			$dis_username = $row['username'];
			$dis_usertype = $row['usertype'];
			$dis_firstname = $row['firstname'];
			$dis_lastname = $row['lastname'];
			$dis_email = $row['email'];
			$flag = $row['flag'];
			
			$dis_seniorcount = 0;
			$dis_famcount = 0;
		
		$subquery = "Select 1 from seniors where user_id = $dis_user_id";
		$subresults = mysqli_query($con, $subquery);
		while($subrow = mysqli_fetch_array($subresults))
		{
			$dis_seniorcount = $dis_seniorcount + 1;
		}
	  
		$subquery = "Select 1 from familymembers where user_id = $dis_user_id";
		$subresults = mysqli_query($con, $subquery);
		while($subrow = mysqli_fetch_array($subresults))
		{
			$dis_famcount = $dis_famcount + 1;
		}
	  
	  echo '
		<tr>';
		
		if($flag==0)
			echo '<td><i class="fa fa-circle statusred" aria-hidden="true"></i> '.$dis_username.'</td>';
	    else
			echo '<td><i class="fa fa-circle statusgreen" aria-hidden="true"></i> '.$dis_username.'</td>';
		
		echo '<td>'.$dis_usertype.'</td>
		<td>'.$dis_firstname.'</td>
        <td>'.$dis_lastname.'</td>
        <td>'.$dis_email.'</td>
        <td>'.$dis_seniorcount.'</td>
        <td>'.$dis_famcount.'</td>';
		
		if($dis_usertype<3)
		{
		if($flag==0)
			echo '<td><button class="btn btn-success">Approve</button></td>';
		else
			echo '<td><button class="btn btn-danger">Disable</button></td>';
		}
		else
		{
			echo '<td><button class="btn btn-primary">Admin User</button></td>';
		}
	  echo '</tr>';
	  
		}
		
     ?>
    </tbody>
  </table>
		
	</div>
	
	</div>