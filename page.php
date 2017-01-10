<?php 
	$page=$_GET['page'];
	switch ($page) {
		case 'index':
			include_once "index.php";
			break;
		case 'home':
			include_once "index.php";
			break;
		case 'login':
			include_once "login.php";
			break;
		default:
			include_once "error404.php";
			break;
	}
?>