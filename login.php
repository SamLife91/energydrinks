<?php include 'header.php'; $show_form = true; $_GET['page']='login';?>
<?php if (isset($_POST['user_login'])){
	// check for login here and redirct to index... else show login form again..
	if(isset($_POST['user_name']) and isset($_POST['user_pass'])){
		$user=$_POST['user_name'];
		$pass=$_POST['user_pass'];
		//checkLogin(user, pass);
		//if true then redirect to index.  $show_form = false;
		/*echo $conn->checkLogin($user,$pass);
		echo 'aaaAAAA';
		exit;*/
		if($conn->checkLogin($user,$pass)){
			$show_form = false;
			header("location:index.php");
		}
	}
}
?>
<?php if($show_form) :?>
	<div class="form-wrapper">
		<form action="" method="post">
			<h3>
				LOGIN
			</h3>
			<div class="form-row">
				<label for="user_name">name:</label>
				<input class="form-control" type="text" name="user_name" placeholder="Name">
			</div>
			<div class="form-row">
				<label for="user_pass">password:</label>
				<input class="form-control" type="password" name="user_pass" placeholder="Password">
			</div>
			<div class="btn-holder">
				<button class="submit" type="submit" value="login" name="user_login">LOGIN</button>
			</div>
			<p>or</p>
			<div class="actions">
				<a href="/reg.php?page=reg" class="btn">Sing UP</a>
			</div>
		</form>
	</div>
<?php endif;?>
<?php include 'footer.php'; ?>