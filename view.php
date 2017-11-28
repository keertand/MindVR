<?php 

include "userauth.php";

?>

<div class="below">

<div class="row Environments">

<?php

	$query = "SELECT * FROM environments where env_id=$env_id";
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$envname = $row['env_name'];
		$tablename = $row['tablename'];
		$env_id = $row['env_id'];
		$subquery = "SELECT * FROM ".$tablename." WHERE env_config_id=$env_config_id";
		$subresults = mysqli_query($con, $subquery);

		echo '<h2>Environment: '.$envname.'</h2>';
		
		while($subrow = mysqli_fetch_array($subresults))
		{
			$current_s_id = $subrow["s_id"];
			$user_id = $subrow["user_id"];
			$img_no = $subrow['img_no'];
			
			$imgarray = [];
			$videoarray = [];
			
			for($i=1;$i<=$img_no;$i++)
			{
				$temp_imgid = $subrow['img_placeholder_'+$i];
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
					
					$subquery2 = "SELECT * FROM connectedmedia WHERE img_id=$temp_imgid";
					$subresults2 = mysqli_query($con, $subquery2);
					while($subrow2 = mysqli_fetch_array($subresults2))
					{
						$connection = $subrow2['video_link'];
						$temp_count = 1;		
					}
					
					if($temp_count==0)
					{
						$connection = "null";	
					}
					
					array_push($imgarray,$link);
					array_push($videoarray,$connection);
				}
				else
				{
					$link = "null";
					$connection = "null";	
					
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


	$bglink = "images/environments/wall1.jpg";
			echo '<div class="env_side" style="background:url('.$bglink.')"><h6>Place#:'.$i.'</h6>';

		for($i=1;$i<=$img_no;$i++)
		{
			
			if($imgarray[$i-1]!='null')
			{
				echo '<div class="placeholder"><img src="'.$imgarray[$i-1].'" /></div>';	
			}
			else
			{
				echo '<select id="placeholder_'.$i.'" class="placeholder">';
				
				$optioncount = 0;
				foreach($option as $availableimglinks)
				{
					echo '<option value="'.$availableimgids[$optioncount].'"><img src="'.$option.'"/></option>';
					$optioncount = $optioncount + 1;
				}
				
				echo '</select>	';
			}
		
			
		}
		
		echo '</div>';
	?>

</div>
</div>