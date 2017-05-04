<?php include 'page.php'; ?>
<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Energy Drinks</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
	<div class="headBanner">
		<h1><a href="/index.php?page=index">EnergyDrinks.com</a></h1>
	</div>
	<div class="menu">
		<?php include 'menu.php'; ?>
	</div>
</header>
<?php include 'DB.php';
		$conn= new Database();
		if(!$conn->connect()){
			echo ' DB ERROR ';
			exit;
		}
?>
	
