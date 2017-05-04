<?php include 'header.php'; ?>
<div class="shell" id="postin">
	<?php
	$dir = "uploads/";
	$post_id = (int)$_GET['post_id'];
	//select from db 
	$result = $conn->select('posts','*',array('post_id'=>$post_id));
	//for ....
	$resultArr = $conn->getResult();
	?>	
	<div class="content">
	<div class="article">
		<div class="article-title">
			<h2><?= $resultArr[0]['post_title'] ?></h2>
		</div>
		<div class="article-content">
			<p>
				<?= $resultArr[0]['post_content'] ?>
			</p>
		</div>
		<div class="article-image">
			<img src="<?= $dir ?><?= $resultArr[0]['post_image'] ?>" alt="">
		</div>
	</div>
	</div>
	<div class="commentSection">
		<?php include 'commentSection.php' ?>
	</div>
	<div class="clear"></div>
	<?php include 'commentForm.php' ?>
</div>

<?php include 'footer.php'; ?>
<style>
	.article-image {
		width: 10%;
		height: auto;
		margin:0 auto;
	}
</style>