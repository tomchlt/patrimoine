<?php
require_once '../model/ModelProducteur.php';

class ControllerProducteur {
    // Affiche la liste des producteurs.
    public static function producteurReadAll() {
        $results = ModelProducteur::getAll();
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAll.php';
        require $vue;
    }
    
    // Affiche un formulaire pour sélectionner un id qui existe.
    public static function producteurReadId($args) {
        $results = ModelProducteur::getAllId();
        $target = $args['target'];
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewId.php';
        require $vue;
    }
    
    // Affiche un producteur particulier (id).
    public static function producteurReadOne() {
        $producteur_id = $_GET['id'];
        $results = ModelProducteur::getOne($producteur_id);
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAll.php';
        require $vue;
    }
    
    // Affiche le formulaire de création d'un producteur.
    public static function producteurCreate() {
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewInsert.php';
        require $vue;
    }
    
    // Affiche le formulaire pour récupérer les informations d'un nouveau producteur.
    public static function producteurCreated() {
        $results = ModelProducteur::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region']));
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewInserted.php';
        require $vue;
    }
    
    // Affiche la liste des régions des producteurs sans doublon.
    public static function producteurReadRegion() {
        $results = ModelProducteur::getAllRegion();
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewRegion.php';
        require $vue;
    }
    
    // Affiche le nombre de producteurs par région.
    public static function nbProducteurByRegion() {
        $results = ModelProducteur::getNbByRegion();
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewNbByRegion.php';
        require $vue;
    }
    
    // Affiche le formulaire pour récupérer les informations d'un producteur
    public static function producteurDeleted() {
        $producteur_id = $_GET['id'];
        $results = ModelProducteur::delete($producteur_id);
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewDeleted.php';
        require $vue;
    }
}
