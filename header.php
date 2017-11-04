<div class="nav row">
	<div class="logo col col-xs-12 col-sm-12 col-md-4 col-lg-6">
		<a href="landing.php"><img src="images/samplelogo.png"></a>
	</div>
	<div class="navlinks col col-xs-12 col-sm-12 col-md-8 col-lg-6">
		<ul class="row">
			
			<?php 
			
			if(isset($_SESSION['username']))
			{
				echo '	<a href="index.php?pagetype=home" class="col-xs-12 col-sm-4 col-md-4" ><li class="btn btn-primary">Home</li></a>
						<a href="index.php?pagetype=environments" class="col-xs-12 col-sm-4  col-md-4" ><li class="btn btn-primary">MyEnvironments</li></a>
						<a href="index.php?pagetype=library" class="col-xs-12 col-sm-4  col-md-4" ><li class="btn btn-primary">Library</li></a>
						';
				if($_SESSION['usertype']>1){		
					echo '<a href="index.php?pagetype=profile" class="col-xs-12 col-sm-4  col-md-4" ><li class="btn btn-primary">Profile</li></a>';
				}
				echo '<a href="index.php?pagetype=logout" class="col-xs-12 col-sm-4 col-md-4" ><li class="btn btn-danger">Logout</li></a>';
			
			}
			else
			{
				echo '<a href="index.php?pagetype=login" class="col-xs-12 col-sm-12 col-md-12" ><li class="btn btn-primary">Login</li></a>';
			}
			
			?>
		</ul>
		
	</div>
</div>