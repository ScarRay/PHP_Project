<?php
// Connexion à la base de données
//*'mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto'*/
try
{
	$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u775661140_webto;charset=utf8', 'u775661140_user', 'rootroot');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO citizen_news (siteName,idName,url,avis) VALUES(?,?,?,0)');
$req->execute(array($_POST['siteName'],$_POST['idName'],$_POST['url']));

// Redirection du visiteur vers la page du minichat
header('Location: ../view/citizen/citizen.php');
?>