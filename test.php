<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon super site</title>


    <link rel="stylesheet" type="text/css" href="/PHP_Project/css/main.css">
    <link href="/PHP_Project/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="/PHP_Project/js/jquery-1.12.3.js"></script>
    <script src="/PHP_Project/css/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once('model/membre/membre.class.php'); ?>
        <?php include("view/bodysite/entete.php"); ?>
            <?php include("view/bodysite/menu.php"); ?>

                <div id="container">
                    <h1 class="page-header">Index</h1>
                    
   <form class="ajax" action="search.php" method="get">
    <p>
        <label for="q">Rechercher un article</label>
        <input type="text" name="q" id="q" />
    </p>
</form>
<!--fin du formulaire-->
 
<!--preparation de l'affichage des resultats-->
<div id="results"></div>

                </div>
                <?php include("view/bodysite/footer.php"); ?>

<script type="text/javascript">

$(document).ready( function() {
  // détection de la saisie dans le champ de recherche
  $('#q').keyup( function(){
    $field = $(this);
    $('#results').html(''); // on vide les resultats
    $('#ajax-loader').remove(); // on retire le loader
 
    // on commence à traiter à partir du 2ème caractère saisie
    if( $field.val().length > 1 )
    {
      // on envoie la valeur recherché en GET au fichier de traitement
      $.ajax({
    type : 'GET', // envoi des données en GET ou POST
    url : 'ajax-search.php' , // url du fichier de traitement
    data : 'q='+$(this).val() , // données à envoyer en  GET ou POST
    beforeSend : function() { // traitements JS à faire AVANT l'envoi
        $field.after('<img src="ajax-loader.gif" alt="loader" id="ajax-loader" />'); // ajout d'un loader pour signifier l'action
    },
    success : function(data){ // traitements JS à faire APRES le retour d'ajax-search.php
        $('#ajax-loader').remove(); // on enleve le loader
        $('#results').html(data); // affichage des résultats dans le bloc
    }
      });
    }       
  });
});
</script>
</body>

</html>