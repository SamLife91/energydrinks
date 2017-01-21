<?php include 'header.php'; ?>
<div class="shell">
	<?php
	if(isset($_SESSION['is_admin']) and $_SESSION['is_admin']){
		$post_id = (int)$_GET['post_id'];
		//select from db 
		$result = $conn->select('posts','*',array('post_id'=>$post_id));
		//for ....
		$resultArr = $conn->getResult();
		$where['post_id'] = $post_id;
		$conn->delete('posts',$where);
	}
	header("location:index.php");
	?>	
</div>
