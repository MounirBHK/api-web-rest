<?php
class PlatsModele extends AccesBd 
{
    public function tout($params)
    {
        return $this->lire("SELECT cat_nom, plat.* FROM plat JOIN categorie ON pla_cat_id_ce=cat_id");
    }

    public function un($id) {

    }

    //...
}