<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Chat BOX</title>
    </head>

    <body>

    <h2>Laissez votre commentaire ici !</h2>
    
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"><br>
        <br>
        <label for="message">Message</label> :  <input type="text" name="message" id="message"><br>
        <br>
        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');


while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>