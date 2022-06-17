<?php
class VinsModele extends AccesBd 
{
    public function tout($groupe)
    {
        return $this->lire("SELECT cat_nom, vin.* FROM vin JOIN categorie 
            ON vin_cat_id_ce=cat_id", $groupe);
    }
}