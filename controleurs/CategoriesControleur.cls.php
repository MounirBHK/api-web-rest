<?php
class CategoriesControleur extends Controleur {
    public function tout($params)
    {
        $groupe = $params['groupe'] ?? false;
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->tout($groupe);
    }

    public function un($id)
    {

    }

    public function ajouter($entite)
    {

    }

    public function remplacer($id, $entite)
    {

    }

    public function changer($id, $fragmentEntite)
    {

    }

    public function retirer($id)
    {

    }
}