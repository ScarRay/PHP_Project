<article>
<h2>Ajouter un site internet</h2>
<form class="form-horizontal" role="form" action="/PHP_Project/model/citizen_post.php" method="post">
<div class="form-group">
            
            <div class="col-sm-3">
                <input type="text" class="form-control" name="siteName" id="siteName" placeholder="Nom du site">
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="idName" id="idName" placeholder="Nom raccourcis">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="url" id="url" placeholder="URL du flux RSS"></input>
            </div>
     
            <div class="col-sm-1">
                <button type="submit" class="btn btn-default">Ajouter</button>
            </div>
    </div>
    </form>
</article>


<article>
<hr/>
    <h2>Consulter les articles</h2>
    <div align="center" width="100%" style="margin-bottom:15px;">
        <select id="rss_num">
            <option value=5>5 articles</option>
            <option value=10 selected="selected">10 articles</option>
            <option value=15>15 articles</option>
            <option value=20>20 articles</option>
        </select>
    </div>
<?php
// Connexion à la base de données
 try
{
    $bdd = new mysqli('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * from (SELECT siteName, idName,url, avis FROM citizen_news) tmp order by tmp.avis desc');
$displayUrl = $bdd->query('SELECT * from (SELECT siteName, idName, url, avis FROM citizen_news) tmp order by tmp.avis desc');
$result = $bdd->query('SELECT COUNT(*) AS nb FROM citizen_news');
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $nbSite = $row['nb'];
?>
<div id="containerNews"><div id="une" class="tabs">

            <div class="tab-links btn-group">
<?php
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
$compteur = 0;
while ($compteur<5 && $donnees = $reponse->fetch_assoc())
{
	echo '<a type="button" class="btn btn-primary" href="#'.htmlspecialchars($donnees['idName']).'">'. htmlspecialchars($donnees['siteName']) .'</a>';
    $compteur ++;
} 

if($nbSite>5) {
?>

<div class="input-group">                                            
                <a type="button" ID="listesites1" Class="form-control"></a>
            <div class="input-group-btn">
                <button type="button" class="btn btn-primary dropdown-toggle pull-left" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul id="ulsite1" class="dropdown-menu dropdown-menu-right">
<?php
}
while($donnees = $reponse->fetch_assoc()) {
?>
        
            <?php
            echo '<li><a href="#'.htmlspecialchars($donnees['idName']).'">'.htmlspecialchars($donnees['siteName']).'</a></li>';
}

$compteur2 = 1;
if($nbSite>5) {?></div>
                </div>
                <?php } ?>
            </div>


        <div class="tab-content">
            <?php
                while($urlDonnee = $displayUrl->fetch_assoc()) { 
                    
                    if($compteur2 == 1) {?>

                        <div id="<?php echo htmlspecialchars($urlDonnee['idName']); ?>" class="tab active">

                        <?php
                    } else { ?>
                        <div id="<?php echo htmlspecialchars($urlDonnee['idName']); ?>" class="tab">
                    <?php } ?>
                    <div class="post_results" rss_url="<?php echo htmlspecialchars($urlDonnee['url']); ?>" id="post_results00<?php echo $compteur2; ?>" rss_num="10">
                        <div class="loading_rss">
                            <img alt="Loading..." src="img/loading.gif" />
                        </div>
                    </div>
                </div>

               
               <?php 
               $compteur2 ++;
           }
            ?>
        </div>  
    </div>
</div>
<div id="iframeContainer1" style="height:1000px;" class="iframeContainer">
    <div id="loadingFrame"> <img style="margin-left:60px;margin-bottom:30px;" alt="Loading..." src="img/loading.gif" />
        <p>Please select an article</p>
        </div>
       
        <!--<iframe id="iframe1" width="49%" height="1000px" sandbox="" src="about:blank" name="newsIframe" seamless align="left"></iframe>--> 
    </div>
</article>