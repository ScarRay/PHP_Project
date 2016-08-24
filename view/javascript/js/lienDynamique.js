//charge le lien automatique en récupérant dès le chargement du fichier lienDynamique.js l'élément "lienAutomatique"
var lienAutomatique = document.getElementById("lienAutomatique");
//on met a jour ensuite son href et son contenu (nom d'affichage)
lienAutomatique.href = "http://www.lilartistique.hol.es";
lienAutomatique.innerHTML = "Mon eportefolio";

//Fonction qui permet de changer l'URL et le nom du lien (innerHTML)
function changer_lien(){
    //on récupère les valeurs des inputs ainsi que le lien qui va changer
    var lien = document.getElementById("changerLienInput").value;
    var innerHtml = document.getElementById("changerInnerHtml").value;
    var lienAChanger = document.getElementById("lienAvecInput");
    //On met a jour le href et le contenu de la balise
    lienAChanger.href = lien;
    lienAChanger.innerHTML = innerHtml;
}

//Fonction qui permet de changer le lien lorsque l'on clique sur l'un des trois boutons
function changer_lien_onclick(url,nom) {
    //On récupère le lien a changer et on lui attribue un nouveau nom et une nouvelle url
    var lienBouton = document.getElementById("lienAvecBouton");
    lienBouton.href = url;
    lienBouton.innerHTML = nom;
}

//Fonction qui permet de changer le lien, mais avec un select. Ne modifie pas le nom
function changer_lien_select(url) {
    var lienSelect = document.getElementById("lienAvecSelect");
    lienSelect.href = url;
}