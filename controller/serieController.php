<article>
    <h2>Ajouter un épisode</h2>

    <form class="form-horizontal" role="form" action="../../model/serie_post.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Nom série :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name" id="name" placeholder="Entrez le nom de la série">
            </div>
            
            <label class="control-label col-sm-3" for="numEpisode">Numéro de l'épisode :</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="numEpisode" id="numEpisode" placeholder="Entrez le numéro de l'épisode">
            </div>
            
            <label class="control-label col-sm-3" for="url">URL Embed :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="url" id="url" placeholder="Entrez l'url au format embed de l'épisode">
            </div>
            <label class="control-label col-sm-3" for="author">Auteur :</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="author" id="author" placeholder="Entrez le nom de l'auteur">
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="control-label col-sm-3" for="description">Description :</label>
            <div class="col-sm-8">
                <textArea type="text" class="form-control" name="description" id="description" placeholder="Entrez une description de l'épisode"></textArea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-default">Ajouter</button>
            </div>
        </div>
    </form>
    
</article>


<article>
    <hr/>
    <h2>Listes de épisodes</h2>
    <?php 
    $messagesParPage=5; //Nous allons afficher 5 messages par page.
 
    //Une connexion SQL doit être ouverte avant cette ligne...
    $retour_total=mysql_query('SELECT COUNT(*) AS total FROM series'); //Nous récupérons le contenu de la requête dans $retour_total
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
$retour_messages=mysql_query('SELECT * FROM series ORDER BY id ASC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
?>
        <p>
            <?php
while($donnees =mysql_fetch_assoc($retour_messages)) {
     ?>
                <div class="serieStyleInline">
                    <?php echo $donnees['name']; ?>
                        <?php echo $donnees['numEpisode']; ?>
                            <br/>
                            <?php echo $donnees['src']; ?>
                </div>
                <?php
}?>
        </p>
        <?php

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