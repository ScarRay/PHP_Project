<?php
// Connexion à la base de données
try
{
	$link = mysqli_connect('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO channels (name,img,description) VALUES(?,?,?)');
//$req->execute(array($_POST['title'], $_POST['imgUrl'],$_POST['description']));

$title = $_POST['title'];
$img = $_POST['imgUrl'];
$description = mysqli_real_escape_string($bdd,$_POST['description']);


$sql="INSERT INTO channels (name,img,description) VALUES ('$title','$img','$description')";

if (!mysqli_query($bdd,$sql)) {
  die('Error: ' . mysqli_error($bdd));
}
echo "1 record added";

mysqli_close($bdd);
?>