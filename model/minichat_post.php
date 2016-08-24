<?php
// Connexion à la base de données
// $link = mysqli_connect('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
try
{
	$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u775661140_webto;charset=utf8', 'u775661140_user', 'rootroot');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date) VALUES(?, ?, CURRENT_TIMESTAMP)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: ../view/minichat/minichat.php');
?>