<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>My Great Blog</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<h1>My Great Blog !</h1>
		<p>
			Last posts of the blog :
		</p>

        <?php
		while ($donnee = $requete->fetch())
			{
				?>
				<div class="news">
					<h3>
				<?= $donnee['title'].' <em>le '.$donnee['date_fr'].'</em>'?>
					</h3>
					<p>
					<?= $donnee['content'] ?>
					<br/>
					<a href="comment.php?post=<?= $donnee['id'] ?>">Comment</a>
					</p>
				</div>
				<?php
			}
			    ?>


	</body>
</html>