<?php

/**
 * Controleur
 */
abstract class Controleur 
{
    protected $modele; // Référence au "Modele" correspondant au "Controleur"
    // Tableau associatif contenant l'entête de statut (Status Header) et le corps 
    // (BODY) du message HTTP de réponse. Ce tableau aura la forme suivante : 
    // ['entete_statut'=> 'Valeur...', 'corps'=>'Valeur du corps du message']
    protected $reponse; 
    
    /**
     * __construct
     *
     * @param  mixed $nomModele
     * @return void
     */
    function __construct($nomModele)
    {
        if(class_exists($nomModele)) {
            $this->modele = new $nomModele();
        }
    }

    // Contrat pour les méthodes spécifiques de chaque contrôleur concret
    public abstract function tout($params);
    public abstract function un($id);
    public abstract function ajouter($entite);
    public abstract function remplacer($id, $entite);
    public abstract function changer($id, $fragmentEntite);
    public abstract function retirer($id);
    
    /**
     * produireReponse
     *
     * @return void
     */
    private function produireReponse() {
        header($this->reponse['entete_statut']);
        if($this->reponse['corps']) {
            echo json_encode($this->reponse['corps']);
        }
        else {
            echo json_encode(['erreur' => 'Rien trouvé']);
        }
    }
    
    /**
     * __destruct
     *
     * @return void
     */
    function __destruct()
    {
        $this->produireReponse();
    }
}