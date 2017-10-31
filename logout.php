
<?php



if(isset($_SESSION['username']))
{
	session_destroy();
	echo "<h1>You are now logged out!</h1>";
	header('Location: index.php?pagetype=login');
}
else
{
	echo "<h1>You are not logged in to log out</h1>";
}


echo "<h1>Logout working</h1>";

?>

<h1>Logging out...</h1>