//Au chargement de la fenêtre (window)
window.onload = function ()
    {
        //on regarde si il y a un cookie dans le document. (longueur > a 0)
        if (document.cookie.length != 0)
        {
            //on sépare les éléments par le '=' et on les ranges dans un tableau
            var tableauCookie = document.cookie.split("=");
            //si le tableau contient un élément à l'indice 1, on change le style de la page.
            //a savoir, le tableau est composé de cette manière :
            //['color','css/cssCouleur.css'];
            if (tableauCookie[1]!=0) document.getElementById("cssChangeur").href = tableauCookie[1];
        }
    }

//Sauvegarder le cookie
function change_cookie_style(feuille){
    //On créé un cookie qui récupère le paramètre "feuille" qui est le chemin vers le css a sauvegarder
    //On ajoute une date d'expiration
    document.cookie = "color=" + feuille +";expires=Fri, 5 Aug 2016 01:00:00 UTC;";
}

//Annuler le cookie
function annuler_cookie(){
    //On réinitialise le cookie 'color' qui devient vide
    document.cookie = "color=";
    alert("Cookie annulé");
}

//Afficher le cookie
function afficher_cookie(){
    alert("Cookie enregistré : "+document.cookie);
}


//Changement de couleur via les boutons et le select
function change_feuille(feuille){
    //On récupère la feuille de style et on change le chemin (href)
	document.getElementById('cssChangeur').setAttribute('href', feuille);
    //On sauvegarde le nouveau css dans le cookie
    change_cookie_style(feuille);
}

//Changement de couleur via l'input
function change_via_input(){
    //On récupère la nouvelle couleur depuis l'input
    var couleur = document.getElementById('changeCouleurInput').value;
    //On initialise une variable feuille qui va contenir le nouveau chemin du css
    var feuille;
    switch (couleur) {
        case 'rouge':
            //Si c'est rouge, on met la variable feuille a jour avec le css correspondant
            feuille = "css/cssRouge.css";
            alert("Rouge");
            break;
        case 'bleu':
            //Voir case rouge
            feuille = "css/cssBleu.css";
            alert("Bleu");
            break;
        case 'violet' :
            //Voir case rouge
            feuille = "css/cssViolet.css";
            alert("Violet");
            break;
        default:
            //Si la couleur n'est pas reconnue, on met le thème par défaut (rouge)
            feuille = "css/cssRouge.css";
            alert("Couleur non reconnue : "+couleur);
    }
    //On change le css et on sauvegarde dans le cookie
    document.getElementById('cssChangeur').setAttribute('href', feuille);
    change_cookie_style(feuille);
}

//Permet de changer la couleur d'une balise 
function changer_couleur_tag(couleur, tag) {
    //On récupère la balise et on compte le nombre de "noeuds" à modifier
    var type_tag = document.getElementsByTagName(tag);
    var affiche_length = type_tag.length;
    //On affiche le nombre de noeuds
    alert('Nombre de noeuds à changer : '+ affiche_length);

    //Pour chaque noeud, on modifie la couleur de celui-ci (couleur via paramètre)
    for (var i = 0; i < type_tag.length; i++) {
        alert('Changer la couleur pour le noeud numéro : '+ i);
        type_tag[i].style.color=couleur;
    }
}

//Permet de changer la couleur de n'importe quelle balise en input
function changer_couleur_tag_particulier(){
    //On récupère la couleur et la balise via les inputs, et on appelle la fonction 'changer_couleur_tag' en lui transmettant les variables
    var tag = document.getElementById("tagAChanger").value;
    var couleur = document.getElementById("couleurDuTag").value;
    changer_couleur_tag(couleur,tag);
}