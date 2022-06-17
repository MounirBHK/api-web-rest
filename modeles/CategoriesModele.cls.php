<?php
class CategoriesModele extends AccesBd 
{
    public function tout($groupe)
    {
        return $this->lire("SELECT * FROM categorie", $groupe);
    }
}