<?php include 'header.php'; $show_form = true;?>
<?php
	if(isset($_POST['user_reg'])){
		if(isset($_POST['user_name_reg']) and isset($_POST['user_pass_reg']) and isset($_POST['user_mail_reg'])){
			$user = filter_var($_POST['user_name_reg'],FILTER_SANITIZE_STRING);
			$pass = sha1($_POST['user_pass_reg']);
			$mail = filter_var($_POST['user_mail_reg'],FILTER_VALIDATE_EMAIL);
			$data = array('name' => $user,'pass' => $pass,'email'=>$mail);
			if($conn->existUser($user)){
				echo "existing User";
			}else{
				$conn->insert('users',$data);
				$show_form = false;
				header('location:index.php');
			}
		}
	}
?>
<?php if($show_form) :?>
<div class="form-wrapper form-control">
	<form action="" method="post">
		<div class="form-row">
			<label for="user_name">User Name:</label>
			<input class="form-control" type="text" name="user_name_reg">
		</div>
		<div class="form-row">
			<label for="user_name">password:</label>
			<input class="form-control" type="password" name="user_pass_reg">
		</div>
		<div class="form-row">
			<label for="user_name">e-mail:</label>
			<input class="form-control" type="email" name="user_mail_reg">
		</div>
		<div class="btn-holder">
			<button class="submit" type="submit" value="register" name="user_reg">Sing Up</button>
		</div>
	</form>
</div>
<?php endif;?>
<?php include 'footer.php'; ?>