<?php
class Membre
{
    private $pseudo;
    private $email;
    private $signature;
    private $actif; 

    public function __construct($idMembre)
    {
    	// Récupérer en base de données les infos du membre
    	// SELECT pseudo, email, signature, actif FROM membres WHERE id = ...
    	
    	// Définir les variables avec les résultats de la base
    	$this->pseudo = $donnees['pseudo'];
    	$this->email = $donnees['email'];
    	// etc.
    }
    
    public function __destruct()
    {
        echo 'Cet objet va être détruit !';
    }


    public function envoyerEMail($titre, $message)
    {
        mail($this->email, $titre, $message);
    }
    
    public function bannir()
    {
        $this->actif = false;
        $this->envoyerEMail('Vous avez été banni', 'Ne revenez plus !');
    }
    
    public function getPseudo()
    {
        return $this->pseudo;
    }
        
    public function setPseudo($nouveauPseudo)
    {
        if (!empty($nouveauPseudo) AND strlen($nouveauPseudo) < 15)
        {
            $this->pseudo = $nouveauPseudo;
        }
    }   
}
?>