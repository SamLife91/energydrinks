<?php
 if(isset($_POST['submit'])){
 	if(isset($_SESSION['name']) and $_SESSION['name']){
 		$id = $_SESSION['id'];
 		$text = filter_var($_POST['text'],FILTER_SANITIZE_STRING);
 		$post_id = (int)$_GET['post_id'];
 		$data = array('author_id'=>$id,'content'=>$text,'post_id'=>$post_id);
 		$conn->insert('comments',$data);
 		header("location:index.php");
 	}
 }
?>
<form action="" class="comment" method="post">
	<textarea name="text" cols="30" rows="3"></textarea>
	<button class="comment" type="submit" name="submit" value="submit">Comment</button>
</form>