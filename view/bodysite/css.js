window.onload = function ()
    {
        console.log(document.cookie);
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
}
           // if (tableauCookie[1]!=0) document.getElementById("cssTheme").href = tableauCookie[1];

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
}