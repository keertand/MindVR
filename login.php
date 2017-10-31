
<?php



if(!isset($_GET['pagetype']) || $_GET['pagetype']!="login")
{
header('Location: index.php?pagetype=login');	
}

if(isset($_SESSION['username']))
{
header('Location: index.php?pagetype=home');
}
/*
else
{
	echo '<h1>again setting username</h1>';
$_SESSION['username'] = "Uncle Bob";
$_SESSION['usertype'] = "0";	

}
*/

?>

<div class="bg">
	<img src="images/login_bg.jpg" />
</div>

<div class="below">

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-6 col-lg-4 col-sm-offset-1 col-md-offset-3 col-lg-offset-4">
		<form method="post" action="login_backend.php">
            <div class="form-login">
            
			<?php
			if(isset($_COOKIE['username']))
			{
				echo '<h4>Welcome back </h4>';
				$username = $_COOKIE['username'];
			}
			else
			{
				echo '<h4>Welcome </h4>';
				$username = "";
			}
			
			?>
			<h4>
            
			<?php echo '<input type="text" id="username" name="username" class="form-control input-sm chat-input" placeholder="username" value="'.$username.'" />';?>
            
			</br>
            <input type="password" id="userpassword" name="password" class="form-control input-sm chat-input" placeholder="password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <input type="submit" class="btn btn-primary btn-md" value="login" />
				<a href="index.php?pagetype=signup" class="btn btn-default btn-md">Signup <i class="fa fa-sign-in"></i></a>
				
				
            </span>
            </div>
            </div>
		</form>
        
        </div>
    </div>
</div>

</div>