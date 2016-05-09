<article>
    <?php 
    $messagesParPage=5; //Nous allons afficher 5 messages par page.
 
    //Une connexion SQL doit être ouverte avant cette ligne...
    $retour_total=mysql_query('SELECT COUNT(*) AS total FROM jeux_video'); //Nous récupérons le contenu de la requête dans $retour_total
    $donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
    $total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
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
$retour_messages=mysql_query('SELECT * FROM jeux_video ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
while($donnees =mysql_fetch_assoc($retour_messages)) {
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