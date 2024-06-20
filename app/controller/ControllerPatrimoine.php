<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelResidence.php';

class ControllerPatrimoine {
    public static function bilan() {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        $comptes = ModelCompte::getByLogin($login);
        $residences = ModelResidence::getByLogin($login);

        include 'config.php';
        $vue = $root . '/app/view/patrimoine/viewBilan.php';
        if (DEBUG)
            echo ("ControllerPatrimoine : bilanPatrimoine : vue = $vue");
        require ($vue);
    }
}
