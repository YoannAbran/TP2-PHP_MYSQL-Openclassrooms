<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8" name="author" lang="fr" content="Yoann ABRAN">
        <title>Mini-chat</title>
    </head>
    <body>
    
        
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
/*connexion bdd*/
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

/*message afficher*/
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');


while ($donnees = $reponse->fetch( ))
{
	echo '<p>' . htmlspecialchars($donnees['pseudo']) . ' : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>



