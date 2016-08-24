//Au chargement du JS, appel la fonction date_heure
date_heure();

//Permet d'afficher le jour, le mois, l'année, l'heure, la minute, et les secondes en temps réel
function date_heure(){
    //On récupère toutes les informations relatives a la date et l'heure
    date = new Date;
    annee = date.getFullYear();
    mois = date.getMonth();
    //On créé un tableau contenant tous les mois
    moisTableau = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
    j = date.getDate();
    jour = date.getDay();
    //on créé un tableau contenant tous les jours
    jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    
    //On récupère l'heure/minute/secondes
    h = date.getHours();
    m = date.getMinutes();
    s = date.getSeconds();
    
    //Pour l'affichage, on ajoute un 0 si c'est inférieur à 10 (plus esthétique)
    if(h<10)h = "0"+h;
    if(m<10) m = "0"+m;
    if(s<10) s = "0"+s;
    
    //On concatène toutes les informations puis on affiche dans l'élément "dateHeure" le nouveau résultat
    resultat = ''+jours[jour]+' '+j+' '+moisTableau[mois]+' '+annee+' '+h+':'+m+':'+s;
    document.getElementById("dateHeure").innerHTML = resultat;
    //Timeout permet de rafraichir la fonction en la relançant toutes les 1s (1000 millièmes de secondes)
    setTimeout('date_heure();','1000');
}