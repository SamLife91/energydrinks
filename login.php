<?php include 'header.php';?>
<div class="form-wrapper form-control">
	<form action="" method="post">
		<div class="form-row">
			<label for="user_name">name:</label>
			<input class="form-control" type="text" name="user_name">
		</div>
		<div class="form-row">
			<label for="user_pass">password:</label>
			<input class="form-control" type="text" name="user_pass">
		</div>
		<div class="btn-holder col-xs-12">
			<button class="submit" type="submit" value="login">LOGIN</button>
		</div>
	</form>
</div>
<?php include 'footer.php'; ?>