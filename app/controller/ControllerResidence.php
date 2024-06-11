<?php
require_once '../model/ModelResidence.php';

class ControllerResidence
{
    public static function listeResidences()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);
        
        $results = ModelResidence::getAllOrderedByPrix();
        include 'config.php';
        $vue = $root . '/app/view/residence/viewListeResidences.php';
        if (DEBUG) {
            echo ("ControllerResidence : listeResidences : vue = $vue");
        }
        require($vue);
    }
}
?>
