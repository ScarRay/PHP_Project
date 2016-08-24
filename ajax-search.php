<?php
//connexion à la base de données 
$link = mysqli_connect('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
 
//recherche des résultats dans la base de données
$compteur = $bdd->query('SELECT count(name) as nb FROM series');
$row = mysqli_fetch_array($compteur,MYSQLI_ASSOC);
    $nbVideo = $row['nb'];
$result =   $bdd->query( 'SELECT name , numEpisode , date, src, author, description
                          FROM series
                          WHERE name LIKE \'' . safe( $_GET['q'] ) . '%\'
                          LIMIT 0,20' );
 
// affichage d'un message "pas de résultats"
if($nbVideo == 0 )
{
?>
    <h3 style="text-align:center; margin:10px 0;">Pas de r&eacute;sultats pour cette recherche</h3>
<?php
}
else
{
    // parcours et affichage des résultats
    while( $post = $result->fetch_assoc())
    {
    ?>
        <div class="article-result">
            <h3><a href="<?php echo $post['name']; ?>"><?php echo $post['name']." #". $post['numEpisode']." " .$post['date']; ?></a></h3>
            <p class="date"> ?></p>
            <p class="url"><?php echo $post['src']; ?></p>
        </div>
    <?php
    }
}
 
/*****
fonctions
*****/
function safe($var)
{
  $bdd = new mysqli('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
	$var = mysqli_real_escape_string($bdd, $var);
	$var = addcslashes($var, '%_');
	$var = trim($var);
	$var = htmlspecialchars($var);
	return $var;
}
?>