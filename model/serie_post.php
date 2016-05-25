<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=webtool;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO series (name,numEpisode,date,src,description,author) VALUES(?,?,CURRENT_TIMESTAMP,?,?,?)');

$urlSrc = str_replace("watch?v=","embed/",$_POST['url']);
$req->execute(array($_POST['name'], $_POST['numEpisode'],'<iframe width="325" height="200" src="'.$urlSrc.'" frameborder="0" allowfullscreen></iframe>', $_POST['description'], $_POST['author']));

// Redirection du visiteur vers la page du minichat
header('Location: ../view/series/findSerie.php');
?>