<?php
class PlatsControleur extends Controleur {
    /**
     * 
     */
    public function tout($params)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $groupe = (isset($params['groupe'])) ? $params['groupe'] : NULL;
        $this->reponse['corps'] = $this->modele->tout($groupe); 
    }

    public function un($id)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->un($id);
    }

    public function ajouter($plat)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 201 Created';
        $this->reponse['corps'] = ['pla_id' => $this->modele->ajouter(json_decode($plat))];
    }

    public function remplacer($id, $plat)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->remplacer($id, json_decode($plat));
    }

    public function changer($id, $fragmentPlat)
    {

    }

    public function retirer($id)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = ['nombre' => $this->modele->retirer($id)];
    }
}