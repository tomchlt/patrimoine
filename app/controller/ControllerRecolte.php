<?php
require_once '../model/ModelRecolte.php';

class ControllerRecolte {
    // Affiche la liste des récoltes.
    public static function recolteReadAll() {
        $results = ModelRecolte::getAll();
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewAll.php';
        require $vue;
    }
    
    // Affiche un formulaire pour sélectionner une récolte qui existe.
    public static function recolteReadId() {
        $results = ModelRecolte::getAllId();
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewInsertOrUpdate.php';
        require $vue;
    }
    
    // Affiche un formulaire pour sélectionner une récolte qui existe.
    public static function recolteCreateOrUpdate() {
        $vin_id = $_GET['vin_id'];
        $producteur_id = $_GET['producteur_id'];
        $quantite = $_GET['quantite'];
        $doesRecolteExist = ModelRecolte::doesRecolteExist($vin_id, $producteur_id);
        if ($doesRecolteExist == 1) {
            ModelRecolte::update($vin_id, $producteur_id, $quantite);
            include 'config.php';
            $vue = $root . '/app/view/recolte/viewUpdated.php';
            require $vue;
        } else if ($doesRecolteExist == 0) {
            ModelRecolte::insert($vin_id, $producteur_id, $quantite);
            include 'config.php';
            $vue = $root . '/app/view/recolte/viewInserted.php';
            require $vue;
        }
    }
}
