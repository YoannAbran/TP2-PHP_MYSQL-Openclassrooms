<!DOCTYPE html>
<html>
<head>
	<title>Blogtest</title>
	 <meta name="author" lang="fr" content="Yoann ABRAN">
     <link rel=stylesheet href="style.css"/>
</head>
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
 
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blogtest;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
print_r($bdd->errorInfo());
while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation']; ?></em>
    </h3>
    
    <p>
    <?php
    echo (htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
}
$req->closeCursor();
?>
</body>
</html>