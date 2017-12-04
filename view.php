<?php 

include "userauth.php";

?>

<div class="below">

<div class="col Environments">


<?php

	$query = "SELECT * FROM environments where env_id=$env_id";
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$envname = $row['env_name'];
		$tablename = $row['tablename'];
		
		$side1 = $row['side1'];
		$side2 = $row['side2'];
		$side3 = $row['side3'];
		$side4 = $row['side4'];
		
		echo '<h2>Environment: '.$envname.'</h2><hr>';
		
		if($usertype>2)
		{
			$subquery = "SELECT * FROM ".$tablename." WHERE env_config_id=$env_config_id";
		}
		else if($usertype==2)
		{
			$subquery = "SELECT * FROM ".$tablename." WHERE env_config_id=$env_config_id and user_id=$user_id";
		}
		else
		{
			$subquery = "SELECT * FROM ".$tablename." WHERE env_config_id=$env_config_id";
		}
	
		$subresults = mysqli_query($con, $subquery);

		
		while($subrow = mysqli_fetch_array($subresults))
		{
			$current_s_id = $subrow["s_id"];
			$user_id = $subrow["user_id"];
			$img_no = $subrow['img_no'];
			$flag = $subrow['flag'];
			
			$subquery2 = "SELECT * FROM seniors where s_id=$current_s_id";
			$subresults2 = mysqli_query($con, $subquery2);
			while($subrow2 = mysqli_fetch_array($subresults2))
			{
				$current_sname = $subrow2["fullname"];
			}
			
			echo '<h2>Senior: '.$current_sname.'</h2><hr>';
			if($flag==0)
				echo '<div class="btn btn-info">Environment awaiting validation from Caregiver</div>';
			else if($flag==1)
				echo '<div class="btn btn-success">Environment validated by Caregiver</div>';
			else if($flag==-1)
			{
				echo '<div class="btn btn-danger">Environment Rejected. Please do the neccesary changes and resubmit.</div>';
			}
			
			echo '<a href="index.php?pagetype=edit&env_id='.$env_id.'&env_config_id='.$env_config_id.'"><div class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>Edit Environment</div></a>';
		
			$imgarray = [];
			$videoarray = [];
			
			
			for($i=1;$i<=$img_no;$i++)
			{
				$temp_imgid = $subrow['img_placeholder_'.$i];
				$temp_count = 0;
				$link = "";
				$connection = "";

				if($temp_imgid!=0)
				{
					$subquery2 = "SELECT * FROM imagedb WHERE img_id=$temp_imgid";
					$subresults2 = mysqli_query($con, $subquery2);

					while($subrow2 = mysqli_fetch_array($subresults2))
					{
						$link = $subrow2['img_link'];
					}
					
					$subquery2 = "SELECT * FROM connectedmedia WHERE env_id=$env_id and env_config_id=$env_config_id and img_placeholder=$i";
					$subresults2 = mysqli_query($con, $subquery2);
					while($subrow2 = mysqli_fetch_array($subresults2))
					{
						$connection = $subrow2['video_id'];
						$temp_count = 1;		
					}
					
					if($temp_count==0)
					{
						$connection = "0";	
					}
					
					
					array_push($imgarray,$link);
					array_push($videoarray,$connection);
				}
				else
				{
					$link = "images/default.jpg";
					$connection = "0";	
					
					
					array_push($imgarray,$link);
					array_push($videoarray,$connection);
				}
				
				
			}
			
		}
	
	}	
	
	
?>

	<?php
	
	$availableimgids = [];
	$availableimglinks = [];
	
	$query = "SELECT img_id, img_link FROM imagedb where user_id=$user_id and s_id=$current_s_id";
	
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		array_push($availableimgids, $row['img_id']);
		array_push($availableimglinks, $row['img_link']);
	}

		
		function get_place($i, $imgarray, $availableimgids, $availableimglinks)
		{
			if($imgarray[$i-1]!='null')
			{
				echo '<div class="viewholder"><div><div class="imgholder"><img src="'.$imgarray[$i-1].'" /></div></div></div>';	
			}
			
		}
		
		
		
		
		echo '<div class="env_side" style="background:url('.$side1.')">';

			echo get_place(1, $imgarray, $availableimgids, $availableimglinks);
			echo get_place(2, $imgarray, $availableimgids, $availableimglinks);
		
		echo '</div>';
		
		
		
		echo '<div class="env_side" style="background:url('.$side2.')">';

			echo get_place(3, $imgarray, $availableimgids, $availableimglinks);
			echo get_place(4, $imgarray, $availableimgids, $availableimglinks);
		
		echo '</div>';
		
		echo '<div class="env_side" style="background:url('.$side3.')">';

			echo get_place(5, $imgarray, $availableimgids, $availableimglinks);
			echo get_place(6, $imgarray, $availableimgids, $availableimglinks);
		
		echo '</div>';
		
		echo '<div class="env_side" style="background:url('.$side4.')">';

			echo get_place(7, $imgarray, $availableimgids, $availableimglinks);
			echo get_place(8, $imgarray, $availableimgids, $availableimglinks);
		
		echo '</div>';
		
		
	?>

	
</div>



</div>