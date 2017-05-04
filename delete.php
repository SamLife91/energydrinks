<?php include 'header.php'; ?>
<div class="shell">
	<div class="content del">
		<?php
		//select from db 
		$result = $conn->select('posts','*');
		//for ....
		$resultArr = $conn->getResult();
		$author = $conn->select('users','user_id, name');
		$authorArr = $conn->getResult();
		$authors = array();
		for($j=0;$j<count($authorArr);$j++){
			$authors[$authorArr[$j]['user_id']]= $authorArr[$j]['name'];
		}
		for($i=0; $i<count($resultArr);$i++){
			var_dump($resultArr[$i]['post_id']);
		?>
		<div class="articles">
			<div class="article">
				<div class="article-title">
					<h2><?= $resultArr[$i]['post_title'] ?></h2>
				</div>
				<div class="action">
					<a class="btn delete" href="/deletepost.php?page=deletepost&post_id=<?= $resultArr[$i]['post_id'] ?>">delete</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php include 'footer.php'; ?>