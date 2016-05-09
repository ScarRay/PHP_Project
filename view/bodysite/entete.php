
<?php 
    //$bdd = new PDO('mysql:host=localhost;dbname=webtool;charset=utf8', 'root', 'root'); 
    $link = mysql_connect('localhost', 'root', 'root');
    if (!$link) {
        die('Impossible de se connecter : ' . mysql_error());
    }

    // Rendre la base de données foo, la base courante
    $db_selected = mysql_select_db('webtool', $link);
    if (!$db_selected) {
        die ('Impossible de sélectionner la base de données : ' . mysql_error());
    }
?>