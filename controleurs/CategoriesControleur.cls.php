<?php

/**
 * CategoriesControleur
 */
class CategoriesControleur extends Controleur {
        
    /**
     * tout
     *
     * @param  mixed $params
     * @return void
     */
    public function tout($params)
    {
        // $groupe = $params['groupe'] ?? false;
       
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $groupe = (isset($params['groupe'])) ? $params['groupe'] : NULL;
        $this->reponse['corps'] = $this->modele->tout($groupe);
    }
    
    /**
     * un
     *
     * @param  mixed $id
     * @return void
     */
    public function un($id)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->un($id);
    }
    
    /**
     * ajouter
     *
     * @param  mixed $categorie
     * @return void
     */
    public function ajouter($categorie)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 201 Created';
        $this->reponse['corps'] = ['cat_id' => $this->modele->ajouter(json_decode($categorie))];
    }
    
    /**
     * remplacer
     *
     * @param  mixed $id
     * @param  mixed $categorie
     * @return void
     */
    public function remplacer($id, $categorie)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->remplacer($id, json_decode($categorie));
    }
    
    /**
     * changer
     *
     * @param  mixed $id
     * @param  mixed $fragmentCategorie
     * @return void
     */
    public function changer($id, $fragmentCategorie)
    {

    }
    
    /**
     * retirer
     *
     * @param  mixed $id
     * @return void
     */
    public function retirer($id)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = ['nombre' => $this->modele->retirer($id)];
    }
}