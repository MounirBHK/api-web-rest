<?php

/**
 * VinsModele
 */
class VinsModele extends AccesBd 
{    
    /**
     * tout
     *
     * @param  mixed $groupe
     * @return void
     */
    public function tout($groupe)
    {
        return $this->lire("SELECT cat_nom, cat_type, vin.* FROM vin JOIN categorie 
            ON vin_cat_id_ce=cat_id", $groupe);
    }
    
    /**
     * un
     *
     * @param  mixed $id
     * @return void
     */
    public function un($id) {
        return $this->lireUn("SELECT cat_nom, vin.* FROM vin JOIN categorie 
            ON vin_cat_id_ce=cat_id WHERE vin_id=:vin_id", ['vin_id'=>$id]);
    }
    
    /**
     * ajouter
     *
     * @param  mixed $vin
     * @return void
     */
    public function ajouter($vin) {
        return $this->creer("INSERT INTO vin 
            (vin_nom, vin_detail, vin_provenance, vin_annee, vin_prix, vin_cat_id_ce) 
            VALUES (?, ?, ?, ?, ?, ?)"
            , [     
                $vin->vin_nom, 
                $vin->vin_detail, 
                $vin->vin_provenance, 
                $vin->vin_annee, 
                $vin->vin_prix, 
                $vin->vin_cat_id_ce]);
    }
    
    /**
     * retirer
     *
     * @param  mixed $id
     * @return void
     */
    public function retirer($id) {
        return $this->supprimer("   DELETE FROM vin 
                                    WHERE vin_id=:vin_id", ['vin_id'=>$id]);
    }

    
    /**
     * remvincer
     *
     * @param  mixed $id
     * @param  mixed $vin
     * @return void
     */
    public function remplacer($id, $vin) {
        return $this->modifier("UPDATE vin SET
                    vin_nom=?, vin_detail=?, vin_provenance=?, vin_annee=?, vin_prix=?, vin_cat_id_ce=?
                    WHERE vin_id=?"
            , [
                $vin->vin_nom, 
                $vin->vin_detail, 
                $vin->vin_provenance,
                $vin->vin_annee, 
                $vin->vin_prix, 
                $vin->vin_cat_id_ce,
                $id
            ]);
    }

}