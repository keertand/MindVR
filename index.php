

<?php session_start();?>

<html>

<?php

require "db.php";

require "head.php";

?>

<body>

<?php 


include "header.php";
?>

<?php

	if(isset($_GET['pagetype']))
	{
		$pagetype = $_GET['pagetype'];
		
		if($pagetype=="home")
		{
			include "home.php";
		}
		else if($pagetype=="login")
		{			
			if(!isset($_SESSION['username']))
			{
			include "login.php";
			}
			else header('Location: index.php?pagetype=home');
		}
		else if($pagetype=="signup")
		{			
			if(!isset($_SESSION['username']))
			{
			include "signup.php";
			}
			else header('Location: index.php?pagetype=home');
		}
		
		else if($pagetype=="profile")
		{
			if(isset($_SESSION['username']))
			{
				if($_SESSION['usertype']>1)
					include "profile.php";
			}
		}
		else if($pagetype=="environments")
		{
			include "environments.php";
		}
		else if($pagetype=="library")
		{
			include "library.php";
		}
		
		else if($pagetype=="logout")
		{
			if(isset($_SESSION['username']))
			{
				include "logout.php";
			}
			else header('Location: index.php?pagetype=login');
		}
		else if($pagetype=="profile")
		{
			require "profile.php";
		}
		else if($pagetype=="landing")
		{
			header('Location: landing.php');	
		}
		else if($pagetype=="resetpw")
		{
			
			include "resetpw.php";
		}
		else
		{
				include "oops.php";
		}
	
	//other page types also come here.
	}
	else
	{
		header('Location: landing.php');	
	}

include "footer.php";

?>


</body>

<script>

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})


$('.actbtns .addfambtn').on('click',function(){
			
			var profile = $(this).attr('data-profile');
			$('#addingto').val(profile);
			
		});

		
$('.libimg').on('click',function(){
			
			var imagesrc = $(this).attr('data-src');
			var imagecomment = $(this).attr('data-cmnt');
			
			$('.popimage').attr('src',imagesrc);
			$('.modalimgcmnt').html(''+imagecomment);
		});

$('.delseniorbtn').on('click',function(){
			
			var seniorname = $(this).attr('data-sname');
			var senior_id = $(this).attr('data-sid');
			
			$('#delsenior .sname').attr('value',seniorname);
			$('#delsenior .sid').attr('value','senior id: '+senior_id);
			
			
		});

		

$('.delfammembtn').on('click',function(){
			
			var seniorname = $(this).attr('data-sname');
			var senior_id = $(this).attr('data-sid');
			var fammem_name = $(this).attr('data-famname');
			var fammem_id = $(this).attr('data-famid');
			
			$('#delfammem .sname').attr('value',seniorname);
			$('#delfammem .sid').attr('value','senior id: '+senior_id);
			$('#delfammem .fam_name').attr('value','Family Member: '+fammem_name);
			$('#delfammem .familymember_id').attr('value',fammem_id);
			
			
		});

		
				

</script>


</html>