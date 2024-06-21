<?php
require_once '../model/ModelResidence.php';
require_once '../model/ModelCompte.php';

class ControllerResidence
{

    public static function mesResidences()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelResidence::getByLogin($login);

        include 'config.php';
        $vue = $root . '/app/view/residence/viewMesResidences.php';
        if (DEBUG) {
            echo ("ControllerResidence : mesResidences : vue = $vue");
        }
        require ($vue);
    }
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

    public static function achatResidence() {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $residences = ModelResidence::getResidencesNotOwnedByUser($login);
        
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAchatResidence.php';
        if (DEBUG) {
            echo ("ControllerResidence : achatResidence : vue = $vue");
        }
        require($vue);
    }

    public static function achatResidence2() {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $residenceId = htmlspecialchars($_GET['residence_id']);
        $comptesAcheteur = ModelCompte::getAllByLogin($login);
        $loginVendeur = ModelResidence::getOwnerLogin($residenceId);
        $comptesVendeur = ModelCompte::getAllByLogin($loginVendeur['login']);
        $residence = ModelResidence::getInfoById($residenceId);

        include 'config.php';
        $vue = $root . '/app/view/residence/viewAchatResidence2.php';
        if (DEBUG) {
            echo ("ControllerResidence : achatResidence2 : vue = $vue");
        }
        require($vue);
    }

    public static function achatResidenceDone() {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelResidence::achat(
            htmlspecialchars($_GET['residence_id']),
            htmlspecialchars($_GET['compteAcheteur_id']),
            htmlspecialchars($_GET['compteVendeur_id']),
            htmlspecialchars($_GET['prix']),
        );

        include 'config.php';
        $vue = $root . '/app/view/residence/viewAchatResidenceDone.php';
        if (DEBUG) {
            echo ("ControllerResidence : achatResidenceDone : vue = $vue");
        }
        require($vue);
    }
}
?>
