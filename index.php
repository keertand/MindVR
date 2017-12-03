

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
		else if($pagetype=="view")
		{
			if(isset($_GET['env_id']) && isset($_GET['env_config_id']))
			{
				$env_id = $_GET['env_id'];
				$env_config_id = $_GET['env_config_id'];
				
				include "view.php";	
			}
			else
			{
				include "environments.php";
			}
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
			
			var s_id = $(this).attr('data-s_id');
			$('#addingto').val(s_id);
			
		});

		
$('.libimg').on('click',function(){
			
			var imagesrc = $(this).attr('data-src');
			var imagecomment = $(this).attr('data-cmnt');
			var img_id = $(this).attr('data-imgid');
			var delbtn = $(this).attr('data-delbtn');
			
			$('#picenlarge #popupmediaid').val(img_id);
			
			$('#picenlarge .popimage').attr('src',imagesrc);
			$('#picenlarge .modalimgcmnt').html(''+imagecomment);
			$('#picenlarge .modal-footer input').hide();
			$('#picenlarge .modal-footer .'+delbtn).show();
			
		});

		
$('.libvid').on('click',function(){
			var videosrc = $(this).attr('data-src');
			var videocomment = $(this).attr('data-cmnt');
			var video_id = $(this).attr('data-videoid');
			var delbtn = $(this).attr('data-delbtn');
			
			$('#videoenlarge #popupmediaid').val(video_id);
			
			$('#videoenlarge .popvideo').attr('src',videosrc);
			$('#videoenlarge .modalimgcmnt').html(''+videocomment);
			$('#videoenlarge .modal-footer input').hide();
			$('#videoenlarge .modal-footer .'+delbtn).show();
			
		});
		
$('.delseniorbtn').on('click',function(){
			
			var seniorname = $(this).attr('data-sname');
			var senior_id = $(this).attr('data-sid');
			
			$('#delsenior .sname').attr('value','Senior Name: '+seniorname);
			$('#delsenior .sid').attr('value',senior_id);
			
			
		});

		

$('.delfammembtn').on('click',function(){
			
			var seniorname = $(this).attr('data-sname');
			var senior_id = $(this).attr('data-sid');
			var fammem_name = $(this).attr('data-famname');
			var fammem_id = $(this).attr('data-famid');
			
			$('#delfammem .sname').attr('value',seniorname);
			$('#delfammem .sid').attr('value',senior_id);
			$('#delfammem .fam_name').attr('value','Family Member: '+fammem_name);
			$('#delfammem .fammem_id').attr('value',fammem_id);
			
			
			
		});
		
		

$('.delenvbtn').on('click',function(){
			
			
			var seniorname = $(this).attr('data-sname');
			var s_id = $(this).attr('data-sid');
			var envname = $(this).attr('data-envname');
			var env_id = $(this).attr('data-envid');
			var env_config_id = $(this).attr('data-envconfigid');
			
			
			$('#delenv .envname').attr('value',envname);
			$('#delenv .env_id').attr('value',env_id);
			$('#delenv .env_config_id').attr('value',env_config_id);
			$('#delenv .s_id').attr('value',s_id);
			$('#delenv .seniorname').attr('value',seniorname);
			
		});
		
		
				

</script>


</html>