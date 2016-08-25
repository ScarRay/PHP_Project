<?php
$host = "mysql.hostinger.fr"; // Hôte : ex : localhost
$login = "u775661140_user"; // Login d'accès à la base
$passe = "rootroot"; // Password
$base = "u775661140_webto"; // Base de données
$table = "visites";
//$link = mysqli_connect('mysql.hostinger.fr', 'u775661140_user', 'rootroot', 'u775661140_webto');
// On récupère la date du jour.

$now_Y = date("Y");
$now_m = date("m");
$now_d = date("d");
$date  = "$now_d-$now_m-$now_Y";

// On effectue une connection à la table

@MYSQL_CONNECT($host,$login,$passe) or die ("<font face=arial size=2><b>Impossible de tenter une connection !</b>.");
@MYSQL_SELECT_DB("$base") or die ("Connexion à la base $base impossible");

// On efface les IP qui sont "périmées" (date actuelle différente des dates précédentes)
//$delete = "DELETE * FROM $table WHERE date != '$date'";
//$query = "Mysql_Query($delete)";

// On effectue une recherche pour savoir si l'IP est déjà enregistrée.

$query = Mysql_Query("SELECT ip FROM $table WHERE date='$date'");

// On vérifie l'ip

    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';



if($ipaddress != '$REMOTE_ADDR')
{

// On insère l'ip si elle n'existe pas.

$insert = "INSERT INTO $table (ip,date) VALUES('$ipaddress','$date')";
$query = Mysql_Query($insert);

}

// On récupère la valeur du compteur

$select = Mysql_Query("SELECT ip FROM $table WHERE date = '$date'");
$compteur = mysql_num_rows($select);

// On ferme la connection avec MySQL

mysql_close();

?>

<div class="push col-sm-12"></div>
<div id="footerVisite"><div class="well">
<?php
// a simple way to get a user's repo

    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/ScarRay/PHP_Project/commits");

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    $output = curl_exec($ch);
    $output = json_decode($output,true);
    echo "test ".$output[0];
    echo $output;
    // close curl resource to free up system resources
    curl_close($ch); 

?>
<br/>Aujourd'hui nous avons eu : <?php echo $compteur." visiteurs." ?></div></div>
<footer class="col-sm-12 bs-docs-footer" role="contentinfo">
    
    <ul class="bs-docs-footer-links"> 
        <li><a href="https://github.com/twbs/bootstrap">Facebook</a>            </li> 
        <li><a href="https://twitter.com/getbootstrap">CV</a></li>
    </ul>
    <div class="container">Copyright by windoZ Studio</div>
    
<link id="cssTheme" rel="stylesheet" type="text/css" href="/PHP_Project/css/themePurple.css">
<script type="text/javascript">
    function set_theme(){
        //on regarde si il y a un cookie dans le document. (longueur > a 0)
        if (document.cookie.length != 0)
        {
            //on sépare les éléments par le '=' et on les ranges dans un tableau
            var tableauCookie = document.cookie.split("=");
            //si le tableau contient un élément à l'indice 1, on change le style de la page.
            //a savoir, le tableau est composé de cette manière :
            //['color','css/cssCouleur.css'];
            var theme = getCookie("theme");
            if (theme!="") {
                document.getElementById("cssTheme").href = theme;
            } else {
                setCookie("theme", '/PHP_Project/css/themeRed.css', 365);
            }
        }
           // if (tableauCookie[1]!=0) document.getElementById("cssTheme").href = tableauCookie[1];
    }
        

function change_cookie_style(feuille){
    //On créé un cookie qui récupère le paramètre "feuille" qui est le chemin vers le css a sauvegarder
    //On ajoute une date d'expiration
    document.cookie = "theme=" + feuille +";expires=Fri, 5 Aug 2018 01:00:00 UTC;";
    document.getElementById("cssTheme").href = feuille;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}</script>
</footer>