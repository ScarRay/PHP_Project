<article>
    
    <h2><img id="hideAddEps" class="hideCategorie" src="/PHP_Project/controller/down-arrow.png">  Ajouter un épisode ou channel à suivre</h2>
    <div id="addEps" class="col-sm-12" style="display:show;">
    <div class="col-sm-12 col-lg-6">
    <form class="form-horizontal" role="form" action="/PHP_Project/model/serie_post.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-4 col-lg-5" for="name">Nom série :</label>
            <div class="col-sm-8 col-lg-7">
                <input type="text" class="form-control" name="name" id="name" placeholder="Entrez le nom de la série">
            </div>
            
            <label class="control-label col-sm-offset-0 col-sm-4 col-lg-5" for="numEpisode">Numéro épisode :</label>
            <div class="col-sm-8 col-lg-7">
                <input type="number" class="form-control" name="numEpisode" id="numEpisode" placeholder="Entrez le numéro de l'épisode">
            </div>
            
            <label class="control-label col-sm-4 col-lg-5" for="url">URL Embed :</label>
            <div class="col-sm-8 col-lg-7">
                <input type="text" class="form-control" name="url" id="url" placeholder="Entrez l'url au format embed de l'épisode">
            </div>
            <label class="control-label col-sm-4 col-lg-5" for="author">Auteur :</label>
            <div class="col-sm-8 col-lg-7">
                <input type="text" class="form-control" name="author" id="author" placeholder="Entrez le nom de l'auteur">
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="control-label col-sm-4 col-lg-5" for="description">Description :</label>
            <div class="col-sm-8 col-lg-7">
                <textArea type="text" class="form-control" name="description" id="description" placeholder="Entrez une description de l'épisode"></textArea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-lg-offset-5 col-sm-8 col-lg-7">
                <button type="submit" class="btn btn-success">Ajouter épisode</button>
            </div>
        </div>
    </form>
    </div>



    <div class="col-sm-12 col-lg-6">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="control-label col-sm-4 col-lg-5" for="userName">Nom de l'utilisateur :</label>
            <div class="col-sm-8 col-lg-5">
                <input type="text" class="form-control" name="userName" id="userName" placeholder="Entrez le nom de l'utilisateur à ajouter">
            </div>
        </div>
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-offset-5 col-sm-8 col-lg-7">
                <button id="submitUserName" type="button" class="btn btn-warning">Ajouter utilisateur</button>
            </div>
            </div>
    </form>
    </div>
    <div class="col-sm-12 col-lg-6">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="control-label col-sm-4 col-lg-5" for="channelName">Nom du channel :</label>
            <div class="col-sm-8 col-lg-5">
                <input type="text" class="form-control" name="channelName" id="channelName" placeholder="Entrez le nom du channel à ajouter">
            </div>
        </div>
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-offset-5 col-sm-8 col-lg-7">
                <button id="submitChannel" type="button" class="btn btn-info">Ajouter channel</button>
            </div>
            </div>
    </form>
    </div>
</div>
</article>


<article>
<div class="col-sm-12">
    <hr/>
</div>
    <h2><img id="hideListeEps" class="hideCategorie" src="/PHP_Project/controller/down-arrow.png">  Listes des épisodes <small  style="display:none;float:right;">EFFECTUER UNE RECHERCHE : <input type="text" name="q" id="q" /><button id="cancelButton" class="btn btn-danger" type="button" disabled="disabled">X</button></small></h2>
    
<!--fin du formulaire-->
 
<!--preparation de l'affichage des resultats-->
<div id="listeEps" style="display:show;">
    <?php 
    $messagesParPage=6; 
 try
{
    $bdd = new mysqli('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

    //Une connexion SQL doit être ouverte avant cette ligne...
    //$retour_total=$bdd->query('SELECT COUNT(*) AS total FROM series'); //Nous récupérons le contenu de la requête dans $retour_total
    $result = $bdd->query("SELECT COUNT(*) AS nb FROM series");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $total = $row['nb'];
    $compteur = 0;
    
    //$donnees_total=mysqli_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
    //$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
    
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
$query = 'SELECT * FROM series ORDER BY id ASC LIMIT '.$premiereEntree.', '.$messagesParPage.'';
if ($retour_messages = $bdd->query($query)) {
?>
       <div class="col-sm-12">
            <?php
while($donnees = $retour_messages->fetch_assoc()) {
 ?>
                <div class="serieStyleInline col-sm-12 col-md-6 col-lg-4">
                    <h3 style="width:300px;white-space: nowrap;overflow:scroll !important;"><?php echo htmlspecialchars($donnees['name']); ?>
                        <?php echo "#" .htmlspecialchars($donnees['numEpisode']) . " <small style='float:center;'>" . htmlspecialchars($donnees['date'])."</small>"; ?></h3>
                            <?php echo $donnees['src'] ; ?>
                </div>
                <?php
                $compteur++;
    }
}?>
      </div>
        <?php

echo '<p class="col-sm-12"align="center">Page : '; 
for($i=1; $i<=$nombreDePages; $i++) {
     if($i==$pageActuelle) {
         echo ' ['.$i.'] '; 
     } else {
          echo ' <a href="?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';

   
        ?>
        </div>
</article>

<article>
<div class="col-sm-12">
<hr/>
   
  </div>  
   <h2><img id="hideCeleb" class="hideCategorie" src="/PHP_Project/controller/down-arrow.png">  Célébrités à suivre</h2>
   <div id="userAddedDiv" style="display:show;" class="row" >

   <?php 
        $result = $bdd->query("SELECT COUNT(*) AS nb FROM channels");

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $total = $row['nb'];
        $compteur = 0;
    //$donnees_total=mysqli_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
    //$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
    $userParPage=3;
    //Nous allons maintenant compter le nombre de pages.
    $nombreDePagesUser=ceil($total/$userParPage);

if(isset($_GET['pageUser'])) {
     $pageUserActuelle=intval($_GET['pageUser']);
     if($pageUserActuelle>$nombreDePagesUser) {
          $pageUserActuelle=$nombreDePagesUser;
     }
}
else { $pageUserActuelle=1; }
 
$premiereEntree=($pageUserActuelle-1)*$userParPage;
$query = 'SELECT * FROM channels ORDER BY id ASC LIMIT '.$premiereEntree.', '.$userParPage.'';
if ($retour_messages = $bdd->query($query)) {
?>
      
            <?php
while($donnees = $retour_messages->fetch_assoc()) {
 ?>
                <div style="max-height:500px;overflow:scroll;"class="col-sm-12 col-md-6 col-lg-4">
            <div class="thumbnail">
            <img src="<?php echo htmlspecialchars($donnees['img']) ; ?>" alt="<?php echo htmlspecialchars($donnees['name']) ; ?>">
            <div class="caption">
                <h3><?php echo htmlspecialchars($donnees['name']) ; ?></h3>
                <p><?php echo htmlspecialchars($donnees['description']) ; ?></p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
            </div>
           </div>
           </div>
                <?php
                $compteur++;
    }
}?>
      
        <?php
   echo '<p class="col-sm-12"align="center">Page : '; 
   
for($i=1; $i<=$nombreDePagesUser; $i++) {
     if($i==$pageUserActuelle) {
         echo ' ['.$i.'] '; 
     } else {
          echo ' <a href="?pageUser='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';?>
</div>
</article>
