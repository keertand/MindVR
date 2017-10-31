<?php
require "head.php";
require "header.php";
?>

<!DOCTYPE html>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-6 col-lg-4 col-sm-offset-1 col-md-offset-3 col-lg-offset-4">
		<form method="post" action="signup_backend.php">
            <div class="form-login">
            
			<?php
				echo '<h4>Please Sign Up</h4>';
				$username = "";
			?>
			<h4>
            
			<?php echo '<input type="text" id="username" name="username" class="form-control input-sm chat-input" placeholder="username" value="'.$username.'" />';?>
            
			<br>
			<input type="text"  name="fname" class="form-control input-sm chat-input" placeholder="Firstname" />
            </br>
			<input type="text"  name="lname" class="form-control input-sm chat-input" placeholder="Lastname" />
            </br>
			<input type="password" name="password1" class="form-control input-sm chat-input" placeholder="password" />
            </br>
			<input type="password" name="password2" class="form-control input-sm chat-input" placeholder="Retype password" />
			<br>
            <input type="email" id="email" name="email" class="form-control input-sm chat-input" placeholder="Email" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <input type="submit" class="btn btn-primary btn-md" value="Sign Up" />
				
				
            </span>
            </div>
            </div>
		</form>
        
        </div>
    </div>
</div>