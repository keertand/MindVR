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
			
			$imgarray = [];
			$videoarray = [];
			
			
			for($i=1;$i<=$img_no;$i++)
			{
				$temp_imgid = $subrow['img_placeholder_'.$i];
				$temp_count = 0;
				$link = "";
				$connection = "";

				//if($temp_imgid!=0)
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
			/*	else
				{
					$link = "0";
					$connection = "0";	
					
					
					array_push($imgarray,$link);
					array_push($videoarray,$connection);
				}
			*/
				
			}
			
		}
	
	}	
	
	
?>

	<?php
	
	$availableimgids = [];
	$availableimgnames = [];
	$availableimglinks = [];
	
	$availablevideoids = [];
	$availablevideonames = [];
	$availablevideolinks = [];
	
	
	array_push($availableimgids, 0);
	array_push($availableimgnames, 'No image');
	array_push($availableimglinks, 'images/default.jpg');
	
	$query = "SELECT img_id, img_name, img_link FROM imagedb where user_id=$user_id and s_id=$current_s_id";
	
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$img_name = $row['img_name'];
		if($img_name=='')
		{
			$img_name = 'Unnamed image';
		}
		
		array_push($availableimgids, $row['img_id']);
		array_push($availableimgnames, $img_name);
		array_push($availableimglinks, $row['img_link']);
	}
	
	$query = "SELECT video_id, video_name, video_link FROM videodb where user_id=$user_id and s_id=$current_s_id";
	
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$video_name = $row['video_name'];
		if($video_name=='')
		{
			$video_name = 'Unnamed video';
		}
		
		array_push($availablevideoids, $row['video_id']);
		array_push($availablevideonames, $video_name);
		array_push($availablevideolinks, $row['video_link']);
	}

		
		function get_place($i, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames)
		{
			if($imgarray[$i-1]!='0')
			{
				echo '<div class="placeholder"><div><span>Placeholder #'.$i.'</span><div class="imgholder"><img src="'.$imgarray[$i-1].'" /></div>';
				
				echo '<label>Select Image</label><select id="placeholder_'.$i.'" name="placeholder_'.$i.'" class="imglist">';
				
			
				$optioncount = 0;
				foreach($availableimglinks as $option)
				{
					echo '<option value="'.$availableimgids[$optioncount].'"><div>'.$availableimgnames[$optioncount].'<img src="'.$availableimglinks[$optioncount].'" alt="img_values" ></div></option>';
					$optioncount = $optioncount + 1;
				}
				
				echo '</select>	';
				
				echo '<label>Connect Video</label><select id="placeholder_vid_'.$i.'"  name="placeholder_vid_'.$i.'" class="imglist">';
				
				echo '<option value="0">No video<img src="images/default.jpg"/></option>';
				
				$optioncount = 0;
				foreach($availablevideolinks as $option)
				{
					echo '<option value="'.$availablevideoids[$optioncount].'"><div>'.$availablevideonames[$optioncount].'<img src="'.$availablevideolinks[$optioncount].'" alt="video_values" ></div></option>';
					$optioncount = $optioncount + 1;
				}
				
				echo '</select>';
				
				echo '</div></div>';	
			}
			
			else
			{
				echo '<div class="placeholder"><div><span>Placeholder #'.$i.'</span><div class="imgholder"><img src="" /></div>';
				echo '<label>Select Image</label><select id="placeholder_'.$i.'"  name="placeholder_'.$i.'" class="imglist">';
				
				echo '<option value="0">No image<img src="images/default.jpg"/></option>';
				
				$optioncount = 0;
				foreach($availableimglinks as $option)
				{
					echo '<option value="'.$availableimgids[$optioncount].'">'.$availableimgnames[$optioncount].'</option>';
					$optioncount = $optioncount + 1;
				}
				
				echo '</select>';
				
				
				echo '<label>Connect Video</label><select id="placeholder_'.$i.'"  name="placeholder_vid_'.$i.'" class="imglist">';
				
				echo '<option value="0">No video<img src="images/default.jpg"/></option>';
				
				$optioncount = 0;
				foreach($availableimglinks as $option)
				{
					echo '<option value="'.$availablevideoids[$optioncount].'"><div>'.$availablevideonames[$optioncount].'<img src="'.$availablevideolinks[$optioncount].'" alt="img_values" ></div></option>';
					$optioncount = $optioncount + 1;
				}
				
				echo '</select>';
				
				
				
				echo '</div></div>';
			}
		}
		
		
		
		echo '<form action="envsave_backend.php" method="POST">
		<input type="text" value="'.$env_id.'" name="env_id" hidden />
		<input type="text" value="'.$env_config_id.'" name="env_config_id" hidden />
		<input type="text" value="'.$img_no.'" name="imgno" hidden />
		';
		
		
		
		echo '<div class="env_side" style="background:url('.$side1.')">';

			echo get_place(1, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
			echo get_place(2, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
		
		echo '</div>';
		
		
		
		echo '<div class="env_side" style="background:url('.$side2.')">';

			echo get_place(3, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
			echo get_place(4, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
		
		echo '</div>';
		
		echo '<div class="env_side" style="background:url('.$side3.')">';

			echo get_place(5, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
			echo get_place(6, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
		
		echo '</div>';
		
		echo '<div class="env_side" style="background:url('.$side4.')">';

			echo get_place(7, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
			echo get_place(8, $imgarray, $availableimgids, $availableimgnames, $availableimglinks, $availablevideoids, $availablevideolinks, $availablevideonames);
		
		echo '</div>';
		
		
		echo '<input type="submit" class="btn btn-primary" value="Save Environment and view">';
		echo '</form>';
		
	?>

	
</div>



</div>