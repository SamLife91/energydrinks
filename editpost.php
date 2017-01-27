<?php include 'header.php'; ?>
<div class="shell">
	<?php
	$dir = "uploads/";
	$post_id = (int)$_GET['post_id'];
	//select from db 
	$result = $conn->select('posts','*',array('post_id'=>$post_id));
	//for ....
	$resultArr = $conn->getResult();
	?>
	<?php 
		if(isset($_POST['submit'])){
			if(isset($_POST['post_title']) and isset($_POST['description']))
				$title = filter_var($_POST['post_title'],FILTER_SANITIZE_STRING);
				$description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
				$cols = array('post_title' =>$title,'post_content' => $description);
				if(isset($_FILES['uploadImg'])){
					$image = uploadImage();
					if($image!==false){
						$cols['post_image']= $image;
					}
				}
				$where ['post_id'] = $post_id;
				$conn->update('posts',$cols,$where);
				header('location:index.php');
		}
	?>
	<div class="form-wrapper form-control">
	<form action="" method="post" enctype="multipart/form-data">
		<h3>
			Edit
		</h3>
		<div class="form-row">
			<label for="post_title">Title:</label>
			<input class="form-control" type="text" name="post_title" placeholder="Title" value="<?= $resultArr[0]['post_title']?>">
		</div>
		<div class="form-row">
			<label for="description">description</label>
			<textarea name="description" cols="30" rows="10" value="<?= $resultArr[0]['post_content']?>"></textarea>
		</div>
		<div class="form-row">
			<img src="<?= $dir ?><?= $resultArr[0]['post_image']?>" alt="">
		</div>
		<div class="form-row">
			<label for="uploadImg">Upload Image</label>
			<input type="file" name="uploadImg" id="uploadImg">
		</div>
		<div class="btn-holder">
			<button class="submit" type="submit" name="submit" value="submit">Update</button>
		</div>
	</form>
</div>
</div>
<?php include 'footer.php'; ?>