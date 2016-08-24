
<?php 
    //$bdd = new PDO('mysql:host=localhost;dbname=webtool;charset=utf8', 'root', 'root'); 
    $link = mysqli_connect('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
    if (!$link) {
        die('Impossible de se connecter : ' . mysqli_error());
    }

    // Rendre la base de données foo, la base courante
    $db_selected = mysqli_select_db($link,'u775661140_webto');
    if (!$db_selected) {
        die ('Impossible de sélectionner la base de données : ' . mysqli_error($link));
    }
?>