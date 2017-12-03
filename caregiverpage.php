
	
	<div class="col">
	<br><br><br>
	
	
	<h1>Caregiver Portal</h1>
	<h2><?php echo 'Hello : '.$username;?></h2><br>
	
	<div class="row">
		<h4>Environment approvals</h4>
		
		 <table class="table table-striped">
    <thead>
      <tr>
        <th>Environment ID</th>
	    <th>Senior Name</th>
        <th>Senior ID</th>
		<th>Updated By</th>
        <th>Updated On</th>
		<th>Link to Environment</th>
		<th>Actions</th>
      </tr>
    </thead>
    <tbody>
      
	 <?php
	  
		$query = "SELECT * FROM environments where flag =1";
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
				
				$dis_s_id = $subrow["s_id"];
				$dis_flag = $subrow["flag"];
				$dis_env_config_id = $subrow["env_config_id"];
				$dis_timestamp = $subrow["timestamp"];
				
				$dis_env_link = "index.php?pagetype=view&env_id=".$env_id."&env_config_id=".$dis_env_config_id;
				
				$subquery2 = "SELECT handler_id, timestamp from logfile where content_id = $dis_env_config_id order by timestamp desc limit 1";
				$subresults2 = mysqli_query($con, $subquery2);
			
				while($subrow2 = mysqli_fetch_array($subresults2))
				{
					$dis_handler_id = $subrow2["handler_id"];
				}
				
				$subquery2 = "SELECT fullname from seniors where s_id = $dis_s_id";
				$subresults2 = mysqli_query($con, $subquery2);
			
				while($subrow2 = mysqli_fetch_array($subresults2))
				{
					$dis_seniorname = $subrow2["fullname"];
				}
				
				$subquery2 = "SELECT firstname, lastname from userdetails where user_id = $dis_handler_id";
				$subresults2 = mysqli_query($con, $subquery2);
			
				while($subrow2 = mysqli_fetch_array($subresults2))
				{
					$dis_handler_name = $subrow2["firstname"] . ' '. $subrow2["lastname"];
				}
				
				
				
				echo '
					<tr>';
					
					if($dis_flag==0)
						echo '<td><i class="fa fa-circle statusred" aria-hidden="true"></i> '.$dis_env_config_id.'</td>';
					else
						echo '<td><i class="fa fa-circle statusgreen" aria-hidden="true"></i> '.$dis_env_config_id.'</td>';
					
					echo '<td>'.$dis_seniorname.'</td>
					<td>'.$dis_s_id.'</td>
					<td>'.$dis_handler_name.'</td>
					<td>'.$dis_timestamp.'</td>
					<td><a href="'.$dis_env_link.'">View</a></td>';
					
					
					if($dis_flag==0)
					{
						echo '<td><a href="envapprove_backend.php?env_id='.$env_id.'&env_config_id='.$dis_env_config_id.'"><button class="btn btn-success">Approve</button></a></td>';
					}
					else if($dis_flag==1)
					{
						echo '<td><a href="envdisapprove_backend.php?env_id='.$env_id.'&env_config_id='.$dis_env_config_id.'"><button class="btn btn-danger">Disapprove</button></a></td>';
					}
					else if($dis_flag==-1)
					{
						echo '<td><button class="btn btn-default">Rejected</button></td>';
					}
					
				  echo '</tr>';
							
							
			}
		}
				  
	  
	/*  
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
        <td>'.$dis_seniorcount.'</td>';
		
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
		*/
     ?>
    </tbody>
  </table>
		
	</div>
	
	<br><br><br><br><br><br>
	
	</div>
	
	