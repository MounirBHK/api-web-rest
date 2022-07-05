<?php

/**
 * VinsControleur
 */
class VinsControleur extends Controleur {
        
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
     * @param  mixed $vin
     * @return void
     */
    public function ajouter($vin)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 201 Created';
        $this->reponse['corps'] = ['vin_id' => $this->modele->ajouter(json_decode($vin))];
    }
    
    /**
     * remplacer
     *
     * @param  mixed $id
     * @param  mixed $vin
     * @return void
     */
    public function remplacer($id, $vin)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->remplacer($id, json_decode($vin));
    }
    
    /**
     * changer
     *
     * @param  mixed $id
     * @param  mixed $fragmentVin
     * @return void
     */
    public function changer($id, $fragmentVin)
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