<?php include 'header.php'; ?>
<?php $dir = "uploads/"; ?>
<div class="shell" style="">
	<div class="content">
	<div class="articles">
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
		?>
			<div class="article">
				<div class="article-title">
					<h2><a href="/postin.php?page=postin&post_id=<?= $resultArr[$i]['post_id']?>">
						<?= $resultArr[$i]['post_title'] ?>
						</a>
					</h2>
				</div>
				<div class="article-img">
					<img src="<?= $dir ?><?= $resultArr[$i]['post_image']?>" alt="">
				</div>
				<div class="article-content">
					<p>
						<?= $resultArr[$i]['post_content']?>
					</p>
				</div>
				<div class="clear"></div>
				<div class="article-meta">
					<h5 class="author">
						<p>author:<?= $authors[$resultArr[$i]['user_id']]?></p>
					</h5>
					<p class="date"><?= $resultArr[$i]['create_date']?></p>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>