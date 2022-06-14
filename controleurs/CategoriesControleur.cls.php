<?php
class CategoriesControleur extends Controleur {
    protected function tout($params)
    {
        $this->reponse['entete_statut'] = 'HTTP/1.1 200 OK';
        $this->reponse['corps'] = $this->modele->tout($params);
    }

    protected function un($id)
    {

    }

    protected function ajouter($entite)
    {

    }

    protected function remplacer($id, $entite)
    {

    }

    protected function changer($id, $fragmentEntite)
    {

    }

    protected function retirer($id)
    {

    }
}