<?php

/**
 * CategoriesModele
 */
class CategoriesModele extends AccesBd 
{    
    /**
     * tout
     *
     * @param  mixed $groupe
     * @return void
     */
    public function tout($groupe)
    {
        return $this->lire("SELECT * FROM categorie", $groupe);
    }
    
    /**
     * un
     *
     * @param  mixed $id
     * @return void
     */
    public function un($id) {
        return $this->lireUn("  SELECT * FROM categorie 
                                WHERE cat_id=:cat_id", 
                                ['cat_id'=>$id]);
    }
    
    /**
     * ajouter
     *
     * @param  mixed $categorie
     * @return void
     */
    public function ajouter($categorie) {
        return $this->creer("   INSERT INTO categorie (cat_nom, cat_type) 
                                VALUES (?, ?)" , 
                                [$categorie->cat_nom, $categorie->cat_type]
                            );
    }
    
    /**
     * retirer
     *
     * @param  mixed $id
     * @return void
     */
    public function retirer($id) {
        return $this->supprimer("DELETE FROM categorie WHERE cat_id=:cat_id", ['cat_id'=>$id]);
    }

    
    /**
     * remvincer
     *
     * @param  mixed $id
     * @param  mixed $categorie
     * @return void
     */
    public function remplacer($id, $categorie) {
        return $this->modifier("UPDATE categorie SET
                    cat_nom=?, cat_type=?
                    WHERE cat_id=?"
            , [
                $categorie->cat_nom, 
                $categorie->cat_type,
                $id
            ]);
    }
}
