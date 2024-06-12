<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerCompte -----
class ControllerCompte
{

    public static function mesComptes() {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);
        
        $comptes = ModelCompte::getByLogin($login);
        include 'config.php';
        $vue = $root . '/app/view/compte/viewMesComptes.php';
        if (DEBUG) {
            echo ("ControllerCompte : mesComptes : vue = $vue");
        }
        require ($vue);
    }

    public static function listeComptes() {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);
        
        $results = ModelCompte::getAllWithDetails();
        include 'config.php';
        $vue = $root . '/app/view/compte/viewListeComptes.php';
        if (DEBUG) {
            echo ("ControllerCompte : listeComptes : vue = $vue");
        }
        require ($vue);
    }


}
?>
<!-- ----- fin ControllerCompte -->
