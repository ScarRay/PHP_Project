<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Mon super site</title>
        <link href="/PHP_Project/css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link id="cssChangeur" rel="stylesheet" type="text/css" href="css/cssRouge.css" >

        <script src="/PHP_Project/js/jquery-1.12.3.js"></script>
        <script src="/PHP_Project/css/bootstrap/js/bootstrap.min.js"></script>
        <!-- Les scripts sont chargés à la fin de la page HTML pour éviter les conflits de chargement -->
    </head>
    <body onload="set_theme()">
    <?php include("../bodysite/entete.php"); ?>
    <?php include("../bodysite/menu.php"); ?>
    <div id="container">
       <h1 class="page-header">Javascript <small><span id="dateHeure"></span></small></h1>
        <article id="changeCSS">
            <h2>Changer le CSS :</h2>
            <p>Toutes les fonctions intègrent la sauvegarde par cookie sauf pour le changement de couleur des sous-titres et paragraphes. (Attention aux bloqueurs de cookies !) Pensez à supprimer le cookie pour réinitialiser le thème.</p>
                <button onclick='annuler_cookie()'>Supprimer le Cookie</button>
                <button onclick='afficher_cookie()'>Afficher le Cookie</button>
            
            <ul>
                <li>Changement de CSS par boutons :
                    <button onclick="change_feuille('css/cssRouge.css');">Rouge</button>
                    <button onclick="change_feuille('css/cssBleu.css');">Bleu</button>
                    <button onclick="change_feuille('css/cssViolet.css');">Violet</button>
                </li>
                <li>
                    Changement de CSS par select :
                    <select id="selectTheme" name="selectTheme" onchange="change_feuille(this.value);">
                        <option value=""></option>
                        <option value='css/cssRouge.css'>Rouge</option>
                        <option value='css/cssBleu.css'>Bleu</option>
                        <option value='css/cssViolet.css'>Violet</option>
                    </select>
                </li>
                <li>
                    Changement de CSS par input (ecrire rouge/bleu/violet) :
                    <input id="changeCouleurInput"/><button onclick="change_via_input()">OK</button>
                </li>
                <li>
                    Changer la couleur des sous-titre :
                    <select id="selectTitre" name="selectTitre" onchange="changer_couleur_tag(this.value,'h2');">
                        <option value=""></option>
                        <option value='red'>Rouge</option>
                        <option value='blue'>Bleu</option>
                        <option value='purple'>Violet</option>
                    </select>
                </li>
                <li>
                    Changer la couleur des paragraphes :
                    <select id="selectParag" name="selectParag" onchange="changer_couleur_tag(this.value,'p');">
                        <option value=""></option>
                        <option value='red'>Rouge</option>
                        <option value='blue'>Bleu</option>
                        <option value='purple'>Violet</option>
                    </select>
                </li>
                <li>
                    Changer la couleur d'une balise :
                    <input id="tagAChanger" placeholder="(ex: p,h1,h2,li,a,...)"/><input id="couleurDuTag" placeholder="Couleur"/><button onclick="changer_couleur_tag_particulier()">OK</button>
                </li>
            </ul>
        </article>
        <article id="modifLienDyn">
            <h2>Modification de Lien Dynamique (href):</h2>
            <ul>
                <li>
                    Lien qui change automatiquement (par défaut https://www.google.fr) :
                    
                    <a href="https://www.google.fr" id="lienAutomatique">Mon lien automatique</a>
                </li>
                <li>
                    Changer le lien suivant <a href="https://www.google.fr" id="lienAvecInput">Mon lien</a> :
                    
                    <input placeholder="Nouvel URL" id="changerLienInput"/>  <input placeholder="Nouveau nom" id="changerInnerHtml"/><button onclick="changer_lien()">OK</button>
                </li>
                <li>
                    Changement de lien en fonction du bouton choisi :
                    
                    <a id="lienAvecBouton" href="">Vide</a>
                    <button onclick="changer_lien_onclick('http://google.com','Google');">Google</button>
                    <button onclick="changer_lien_onclick('http://yahoo.fr','Yahoo');">Yahoo</button>
                    <button onclick="changer_lien_onclick('http://bing.fr','Bing!');">Bing!</button>
                    
                </li>
                <li>
                    Changement de lien en fonction du select : 
                    
                    <a id="lienAvecSelect" href="" >Lien généré</a>
                    <select id="selectLien" name="selectLien" onchange="changer_lien_select(this.value);">
                        <option value=""></option>
                        <option value='http://google.com'>Google</option>
                        <option value='http://yahoo.fr'>Yahoo</option>
                        <option value='http://bing.fr'>Bing!</option>
                    </select>
                </li>
            </ul>
        </article>
        <article id="afficherPrompt">
            <h2>Utilisation du Prompt :</h2>
            <ul>
                <li>Je vais vous raconter une histoire dont vous êtes le héro. (Attention celle-ci peut être triste)
                    <button onclick="lancer_histoire_prompt()">Démarrer l'histoire de la tarte</button>
                </li>
                <li>Calculatrice : 
                    <button onclick="calculer('-')">Soustraction</button>
                    <button onclick="calculer('+')">Addition</button>
                    <button onclick="calculer('*')">Multiplication</button></li>
            </ul>
        </article>
        

        <!-- On charge les scripts ici pour éviter les conflits de chargements -->
        <script src="js/changerCss.js"></script>
        <script src="js/lienDynamique.js"></script>
        <script src="js/prompt.js"></script>
        <script src="js/dateHeure.js"></script>

            </div>
            <?php include("../bodysite/footer.php"); ?>
    </body>
</html>