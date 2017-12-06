<?php 

include "userauth.php";

?>

<div class="below">

<div class="row home">

	<?php 
	
		if($usertype>=3)
		{
			include "adminpage.php";
			include "caregiverpage.php";
			
		}
		else if($usertype==2)
		{
			include "caregiverpage.php";
		}
		else
		{	
			echo '<h1>hello '.$username.'</h1>';
		}
		
		
	?>
	
	

</div>
</div>