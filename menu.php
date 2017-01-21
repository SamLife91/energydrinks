<?php
	$page= $_GET['page'];
?>
<nav>
	<ul class="main-nav">
		<li>
			<a href="/index.php?page=index">home</a>
		</li>
		<li>
			<a href="/allPost.php?page=allpost">all post</a>
		</li>
		<?php if(isset($_SESSION['admin']) and $_SESSION['admin']) :?>
		<li class="dropdown">
			<a href="">Panel</a>
			<ul class="admin-actions">
				<li class="admin-action"><a href="/create.php?page=create">Create Post</a></li>
				<li class="admin-action"><a href="/delete.php?page=delete">Delete Post</a></li>
				<li class="admin-action"><a href="/edit.php?page=edit">Edit Post</a></li>
			</ul>
		</li>
		<?php endif ?>
			<?php if(isset($_SESSION['name']) and $_SESSION['name']) :?>
		<li>
			<a href="/logout.php">Logout</a>
		</li>
			<?php else: ?>
		<li>
			<a href="/login.php?page=login">login</a>
		</li>
		 <?php endif; ?>
	</ul>
</nav>