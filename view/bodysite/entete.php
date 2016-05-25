
<?php 
    //$bdd = new PDO('mysql:host=localhost;dbname=webtool;charset=utf8', 'root', 'root'); 
    $link = mysqli_connect('localhost', 'root', 'root', 'webtool');
    if (!$link) {
        die('Impossible de se connecter : ' . mysqli_error());
    }

    // Rendre la base de données foo, la base courante
    $db_selected = mysqli_select_db($link,'webtool');
    if (!$db_selected) {
        die ('Impossible de sélectionner la base de données : ' . mysqli_error($link));
    }
?>