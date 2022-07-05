<?php

/**
 * PlatsControleur
 */
class PlatsControleur extends Controleur {
      
    /**
     * tout
     *
     * @param  mixed $params
     * @return void
     */
    public function tout($params)
    {
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
     * @param  mixed $plat
     * @return void
     */
    public function ajouter($plat)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 201 Created';
        $this->reponse['corps'] = ['pla_id' => $this->modele->ajouter(json_decode($plat))];
    }
    
    /**
     * remplacer
     *
     * @param  mixed $id
     * @param  mixed $plat
     * @return void
     */
    public function remplacer($id, $plat)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->remplacer($id, json_decode($plat));
    }
    
    /**
     * changer
     *
     * @param  mixed $id
     * @param  mixed $fragmentPlat
     * @return void
     */
    public function changer($id, $fragmentPlat)
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