<?php 

include "userauth.php";

?>

<div class="below">

<div class="row home">

	<?php 
	
		if($usertype>=3)
		{
			include "adminpage.php";
		}
		else
		{
			
			echo '<h1>hello '.$username.'</h1>';
		}
	?>
	
	

</div>
</div>