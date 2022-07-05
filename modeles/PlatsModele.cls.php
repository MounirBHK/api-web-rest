<?php

/**
 * PlatsModele
 */
class PlatsModele extends AccesBd 
{    
    /**
     * tout
     *
     * @param  mixed $groupe
     * @return void
     */
    public function tout($groupe)
    {
        return $this->lire("SELECT cat_nom, cat_type, plat.* FROM plat JOIN categorie 
            ON pla_cat_id_ce=cat_id", $groupe);
    }
    
    /**
     * un
     *
     * @param  mixed $id
     * @return void
     */
    public function un($id) {
        return $this->lireUn("SELECT cat_nom, plat.* FROM plat JOIN categorie 
            ON pla_cat_id_ce=cat_id WHERE pla_id=:pla_id", ['pla_id'=>$id]);
    }
    
    /**
     * ajouter
     *
     * @param  mixed $plat
     * @return void
     */
    public function ajouter($plat) {
        return $this->creer("INSERT INTO plat 
            (pla_nom, pla_detail, pla_portion, pla_prix, pla_cat_id_ce) 
            VALUES (?, ?, ?, ?, ?)"
            , [$plat->pla_nom, $plat->pla_detail, $plat->pla_portion, $plat->pla_prix, $plat->pla_cat_id_ce]);
    }
    
    /**
     * retirer
     *
     * @param  mixed $id
     * @return void
     */
    public function retirer($id) {
        return $this->supprimer("   DELETE FROM plat 
                                    WHERE pla_id=:pla_id", ['pla_id'=>$id]);
    }

    
    /**
     * remplacer
     *
     * @param  mixed $id
     * @param  mixed $plat
     * @return void
     */
    public function remplacer($id, $plat) {
        return $this->modifier("UPDATE plat SET
                    pla_nom=?, pla_detail=?, pla_portion=?, pla_prix=?, pla_cat_id_ce=?
                    WHERE pla_id=?"
            , [
                $plat->pla_nom, 
                $plat->pla_detail, 
                $plat->pla_portion, 
                $plat->pla_prix, 
                $plat->pla_cat_id_ce,
                $id
            ]);
    }

}