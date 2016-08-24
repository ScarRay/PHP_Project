//Permet de lancer l'histoire de la tarte interactive
function lancer_histoire_prompt() {
    //Affiche un prompt demandant le nom de l'utilisateur en le récupérant dans une variable
    var nom = prompt("Bonjour et bienvenue dans votre histoire !\n"
          +"Mais tout d'abord, qui êtes vous ?");
    
    //Affiche un prompt demandant le lieu de l'histoire en le récupérant dans une variable
    var lieu = prompt("Ah je savais bien ! Je vous ai reconnu "+nom+"!\n"
                     +"Donc comme je le disais, votre histoire commence.\n"
                     +"Elle commence... dans quel lieu ?");
    
    //Affiche un prompt demandant si l'utilisateur doit manger la tarte(OK ou Annuler), et récupère la réponse sous la forme d'un booléen
    var manger = confirm("Oui voilà ! C'est l'histoire de "+nom
                        +" qui se baladait dans "+lieu+"\n"
                       +" lorsque tout à coup !\n Une énorme tarte apparait de nulle part !\n Voulez vous la manger ?");
    
    //Vérifie si le booléen manger est vrai  ou faux, et affiche la réponse correspondante
    if(manger == true) {
        alert("C'est alors que "+nom+" mangea l'énorme tarte et s'assoupit dans "+lieu+". Fin ! Merci d'avoir joué !");
    } else { 
        alert("Mais finalement "+nom+" ne mangea pas l'énorme tarte et s'assit tranquillement dans "+lieu+". Fin ! Merci d'avoir joué, dommage de ne pas avoir mangé la tarte !");
     }
}

//Permet d'effectuer un calcul via prompt en récupérant le type
function calculer(type) {
    //Utiliser un switch pour différencier les options (- + ou *)
    switch (type) {
        //si option = -, alors on va effectuer une soustraction
        case '-':
            var nb1 = prompt("Choisissez le premier nombre de soustraire :");
            var nb2 = prompt("Choisissez le second nombre :");
            //les prompt précédents récupèrent les chiffres à soustraire, puis effectue le résultat
            var result = nb1-nb2;
            //affichage du resultat
            alert("Résultat de "+nb1+" - "+nb2+" = "+result);
            break;
        case '+':
            //même chose que la soustraction mais avec une addition
            var nb1 = prompt("Choisissez le premier nombre :");
            var nb2 = prompt("Choisissez le second nombre :");
            var result = parseFloat(nb1)+parseFloat(nb2);
            alert("Résultat de "+nb1+" + "+nb2+" = "+result);
            break;
        case '*' :
            //même chose que la soustraction mais avec une multiplication
            var nb1 = prompt("Choisissez le premier nombre :");
            var nb2 = prompt("Choisissez le second nombre :");
            var result = nb1*nb2;
            alert("Résultat de "+nb1+" * "+nb2+" = "+result);
            break;
    }
}