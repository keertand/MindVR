<?php 

include "userauth.php";

?>


<!-- Modal -->
<div class="modal fade" id="picenlarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imgmodalname">
			<span>No Image comment given</span>
		</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src = "images/sample.jpg" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
		<button type="button" class="btn btn-danger">Delete</button>
		<button type="button" class="btn btn-danger">Can't Delete</button>
		
      </div>
    </div>
  </div>
</div>

<div class="below library">



<div class="container-fluid">
<div>

<h2>Your Library</h2>
<br>

<h3>Images</h3>
</hr>
<div class="row imgcollection">
<div class="row">
<?php 

$count = 0;

$query = "SELECT * FROM imagedb WHERE user_id='$user_id'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$imglink = $row['img_link'];
		$imgname = $row['img_name'];
		
		echo '
		<div class="libimg col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3" data-toggle="modal" data-target="#picenlarge">
			<div class="postcont">
				<img src="'.$imglink.'" alt="'.$imgname.'" />
			</div>
			<div class="comment">
				<p>'.$imgname.'</p>
			</div>
		</div>		
		';
		$count = $count + 1;
	}

	
	if ($count==0)
	{
		echo '<h4>No Images currently found</h4>';
	}

?>


<br><br>
</div>
<div class="row">
<a href="#addmedia"><button class="btn btn-primary" style="margin:10px;">Add to Images</button></a>
</div>

</div>

</div>
<div>

<h3>Videos</h3>
</hr>
<div class="row videocollection">

<?php 

$count = 0;

$query = "SELECT * FROM videodb WHERE user_id='$user_id'";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$videolink = $row['video_link'];
		$videoname = $row['video_name'];
		
		echo '
		<div class="libimg col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3">
			<div class="postcont">
				<img src="'.$videolink.'" alt="'.$videoname.'" />
			</div>
			<div class="comment">
				<p>'.$videoname.'</p>
			</div>
		</div>		
		';
		$count = $count + 1;
	}
	
	if ($count==0)
	{
		echo '<h6>No videos currently found</h6>';
	}

?>


<br><br>
<a href="#addmedia"><button class="btn btn-primary" style="margin:10px;" >Add to Videos</button></a>
</div>



</div>

<div class="row">
<div id="addmedia" class="post">
<h2>Add Photos/Videos to Library</h2>
	<ul>
	<form method="post" action="imageupload.php" enctype="multipart/form-data">
		<h3>Upload Image</h3>
		<input class="inpfile btn btn-basic white" type="file" id="file" name="fileToUpload" placeholder="Browse Computer" required><br>
		<input class="inptxt" type="txt" name="imgcomment" placeholder="Image name/Comment..."><br>
		<input type="submit" class="btn btn-primary textinput_btn" value="Upload File" name="submit"/>
	</form>
		<i><h6>--- OR --- </h6></i>
	<form method="post" action="uploadvideo.php" enctype="multipart/form-data">
		<h3>Upload Video</h3>
		<input class="inpfile btn btn-basic white" type="file" id="file" name="fileToUpload" placeholder="Browse Computer" required><br>
		<input class="inptxt" type="txt" name="videocomment" placeholder="Video name/Comment..."><br>
		<input type="submit" class="btn btn-primary textinput_btn" value="Upload File" name="submit"/>
	</form>
	</ul>
	<a href="index.php?pagetype=library"><div class="btn btn-primary">View Library</div></a>
</div>
</div>
</div>

</div>