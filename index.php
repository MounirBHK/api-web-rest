<?php
$urlRequete = $_SERVER['REQUEST_URI'];

$routeur = new Routeur(
    parse_url($urlRequete, PHP_URL_PATH),
    parse_url($urlRequete, PHP_URL_QUERY),
    $_SERVER['REQUEST_METHOD']
);

$routeur->invoquerRoute();

class Routeur 
{
    private $route = '';
    private $params = '';
    private $methode = '';

    function __construct($r, $p, $m)
    {
        $this->route = $r;
        $this->params = $p;
        $this->methode = $m;

        // Autochargement des fichiers de classe
        spl_autoload_register(function($nomClasse) {
            $nomFichier = "$nomClasse.cls.php";
            if(file_exists("controleurs/$nomFichier")) {
                include("controleurs/$nomFichier");
            }
            else if(file_exists("modeles/$nomFichier")) {
                include("modeles/$nomFichier");
            }
        });
    }

    public function invoquerRoute()
    {
        // Exemples d'URLs : 
        // /index.php/plats, /plats/17, /vins, /vins/5
        $entite = "plats";
        $id = "";

        $partiesRoute = explode('/', $this->route);
        print_r($partiesRoute);
        
    }
}