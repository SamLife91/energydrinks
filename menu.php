<?php
	$page= $_GET['page'];

?>
<nav>
	<ul class="main-nav">
		<li>
			<a href="/index.php?page=index">home</a>
		</li>
		<li>
			<a href="">all post</a>
		</li>
		<li class="dropdown">
			<a href="">Panel</a>
			<ul class="admin-actions">
				<li class="admin-action">Create Post</li>
				<li class="admin-action">Delete Post</li>
				<li class="admin-action">Update Post</li>
				<li class="admin-action">Edit Post</li>
				<li class="admin-action">View Users</li>
				<li class="admin-action">Stats</li>
			</ul>
		</li>
		<li>
			<a href="">about</a>
		</li>
		<li>
			<a href="/login.php?page=login">login/out</a>
		</li>
	</ul>
</nav>