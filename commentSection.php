<?php 
	$post_id=(int)$_GET['post_id'];
	$result = $conn->select('comments','*',array('post_id'=>$post_id));
	$resultArr = $conn->getResult();
		$author = $conn->select('users','user_id, name');
		$authorArr = $conn->getResult();
		$authors = array();
		for($j=0;$j<count($authorArr);$j++){
			$authors[$authorArr[$j]['user_id']]= $authorArr[$j]['name'];
		}
		for($i=0; $i<count($resultArr);$i++){
?>


<div class="section comments">

	<div class="comment">
		<div class="commentName">
			<h5>
				FROM: <?= $authors[$resultArr[$i]['author_id']]?>
			</h5>
		</div>
		<div class="comment-content">
			<p>
				<?= $resultArr[$i]['content']?>
			</p>
		</div>
	</div>
</div>
<?php } ?>
