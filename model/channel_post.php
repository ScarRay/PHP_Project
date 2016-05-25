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

$userNamePhp = $_POST['channelName'];
?>
<script>
var apiKey = "key=AIzaSyAGL37W8vsO8Mn8-SE8hKBjyj2r6aohSDQ";
var queryGetId = 'https://www.googleapis.com/youtube/v3/channels?part=snippet&forUsername=<?php echo $userNamePhp ?>&'+apiKey;

console.log(queryGetId);
</script>

<?php
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO channel (name,numEpisode,date,src,description,author) VALUES(?,?,CURRENT_TIMESTAMP,?,?,?)');

?>