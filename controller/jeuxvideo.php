<article>
    <?php 
    $messagesParPage=5; //Nous allons afficher 5 messages par page.
    $bdd = new mysqli('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');

    //Une connexion SQL doit être ouverte avant cette ligne...
    $result = $bdd->query("SELECT COUNT(*) AS nb FROM jeux_video");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $total = $row['nb'];; //On récupère le total pour le placer dans la variable $total.
 
    //Nous allons maintenant compter le nombre de pages.
    $nombreDePages=ceil($total/$messagesParPage);

if(isset($_GET['page'])) {
     $pageActuelle=intval($_GET['page']);
     if($pageActuelle>$nombreDePages) {
          $pageActuelle=$nombreDePages;
     }
}
else { $pageActuelle=1; }
 
$premiereEntree=($pageActuelle-1)*$messagesParPage;
$retour_messages=$bdd->query('SELECT * FROM jeux_video ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
while($donnees = $retour_messages->fetch_assoc()) {
     ?>
        <p>
        <strong>Jeu</strong> :
        <?php echo $donnees['nom']; ?>
        <br /> Le possesseur de ce jeu est :
        <?php echo $donnees['possesseur']; ?>, et il le vend à
        <?php echo $donnees['prix']; ?> euros !
        <br /> Ce jeu fonctionne sur
        <?php echo $donnees['console']; ?> et on peut y jouer à
        <?php echo $donnees['nbre_joueurs_max']; ?> au maximum
        <br />
        <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur
        <?php echo $donnees['nom']; ?> : <em><?php echo     $donnees['commentaires']; ?></em>
        </p>
        <?php
}
 
echo '<p align="center">Page : '; 
for($i=1; $i<=$nombreDePages; $i++) {
     if($i==$pageActuelle) {
         echo ' ['.$i.'] '; 
     } else {
          echo ' <a href="?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
   
        ?>
</article>