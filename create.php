<?php include 'header.php'; $show_form=true;?>
<?php 
	if(isset($_POST['submit'])){
		if(isset($_POST['post_title']) and isset($_POST['description']) and isset($_FILES['uploadImg'])){
			$id = $_SESSION['id'];
			$title = filter_var($_POST['post_title'],FILTER_SANITIZE_STRING);
			$description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
			$image = uploadImage();
			$data = array('user_id'=>$id,'post_title' => $title,'post_content' => $description,'post_image' => $image);
				$conn->insert('posts',$data);
				$show_form = false;
				header('location:index.php');
		}else {
			echo ' error1';
		}
	}
?>
<?php if ($show_form): ?>
<div class="form-wrapper form-control">
	<form action="" method="post" enctype="multipart/form-data">
		<h3>
			Create Post
		</h3>
		<div class="form-row">
			<label for="post_title">Title:</label>
			<input class="form-control" type="text" name="post_title" placeholder="Title">
		</div>
		<div class="form-row">
			<label for="description">description</label>
			<textarea name="description" cols="30" rows="10"></textarea>
		</div>
		<div class="form-row">
			<label for="uploadImg">Upload Image</label>
			<input type="file" name="uploadImg" id="uploadImg">
		</div>
		<div class="btn-holder">
			<button class="submit" type="submit" name="submit" value="submit">Create</button>
		</div>
	</form>
</div>
<?php endif; ?>
<?php include 'footer.php'; ?>