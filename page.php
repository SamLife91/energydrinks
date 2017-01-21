<?php
session_start();
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
		case 'logout':
			include_once "logout.php";
			break;
		case 'reg':
			include_once "reg.php";
			break;
		case 'create':
			include_once "create.php";
			break;
		case 'allpost':
			include_once "allPost.php";
			break;
		case 'edit':
			include_once "edit.php";
			break;
		case 'editpost':
			include_once "editpost.php";
			break;
		case 'delete':
			include_once "delete.php";
			break;
		case 'deletepost':
			include_once "deletepost.php";
			break;
		case 'postin':
			include_once "postin.php";
			break;
		default:
			include_once "error404.php";
			break;
	}
?>