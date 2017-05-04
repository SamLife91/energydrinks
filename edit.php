<?php include 'header.php'; ?>
<div class="shell">
	<div class="content edit">
		<?php
		//select from db 
		$result = $conn->select('posts','*',null,'post_id DESC');
		//for ....
		$resultArr = $conn->getResult();
		$author = $conn->select('users','user_id, name');
		$authorArr = $conn->getResult();
		$authors = array();
		for($j=0;$j<count($authorArr);$j++){
			$authors[$authorArr[$j]['user_id']]= $authorArr[$j]['name'];
		}
		for($i=0; $i<count($resultArr);$i++){
		?>
		<div class="articles">
			<div class="article">
				<div class="article-title">
					<h2><?= $resultArr[$i]['post_title'] ?></h2>
				</div>
				<div class="action">
					<a class="btn edit" href="/editpost.php?page=editpost&post_id=<?= $resultArr[$i]['post_id'] ?>">Edit</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php include 'footer.php'; ?>