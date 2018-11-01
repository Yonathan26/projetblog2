<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>My Great Blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>My Great Blog !</h1>
        <p><a href="indexview.php">Return to the list of posts</a></p>
 
<?php
// Connexion to the datebase
try
{
	$bdd = new PDO('mysql:host=drivinpajo123.mysql.db;dbname=drivinpajo123', 'drivinpajo123', 'Drivin123');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

// Getting the post
$req = $bdd->prepare('SELECT id, title, text as content, DATE_FORMAT(date, "%d/%c/%Y à %Hh%imin%Ss") as date_fr, DATE_FORMAT(date, "%c/%d/%Y at %Hh%imin%Ss") as date_en FROM post_yonathan WHERE id = ?');
$req->execute(array($_GET['posts']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?= htmlspecialchars($donnees['title']) ?>
        <em>le <?= $donnees['date_creation_fr'] ?></em>
    </h3>
    
    <p>
    <?= nl2br(htmlspecialchars($donnees['content'])) ?>
    </p>
</div>

<h2>Comment</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comment WHERE id_post = ? ORDER BY date_comment');
$req->execute(array($_GET['post']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?= htmlspecialchars($donnees['author']) ?></strong> le <?= $donnees['date_commentaire_fr'] ?></p>
<p><?= nl2br(htmlspecialchars($donnees['comment'])) ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>