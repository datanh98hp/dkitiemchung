

<?php
		session_start();
		include_once "./../config/config.php";
		if(isset($_GET["act"]) && $_GET["act"] == "logout"){
			unset($_SESSION['admin_username']);
			include_once __DIR__ ."\..\module\login\login.php";
		}
		if(!isset($_SESSION['admin_username']))
		{
			include_once __DIR__ ."\..\module\login\login.php";
		}else{
			include_once __DIR__ ."\..\\admin.php";
		}
       
?>