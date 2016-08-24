<article>

<?php
// Connexion à la base de données
    //'mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto'
try
{
	$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u775661140_webto;charset=utf8', 'u775661140_user', 'rootroot');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * from (SELECT pseudo, message,id, date FROM minichat ORDER BY ID DESC LIMIT 0, 10) tmp order by tmp.id asc');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p>' . htmlspecialchars($donnees['date']) . ' <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>

<form class="form-horizontal" role="form" action="../../model/minichat_post.php" method="post">
<div class="form-group">
            
            <div class="col-sm-2">
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo">
            </div>
            <div class="col-sm-5">
                <textArea type="text" class="form-control" name="message" id="message" placeholder="Message"></textArea>
            </div>
     
            <div class="col-sm-1">
                <button type="submit" class="btn btn-default">></button>
            </div>
    </div>
    </form>
</article>