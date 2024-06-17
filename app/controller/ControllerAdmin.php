<!-- ----- debut ControllerPersonne -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerAdmin -----
class ControllerAdmin
{
    public static function listeAdmins()
    {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        } 

        $results = ModelPersonne::getAllAdmins();
        include 'config.php';
        $vue = $root . '/app/view/admin/viewlisteAdmins.php';
        if (DEBUG) {
            echo ("ControllerAdmin : listeAdmins : vue = $vue");
        }
        require ($vue);
    }
}