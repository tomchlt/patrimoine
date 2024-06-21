<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerClient -----
class ControllerClient
{

    public static function listeClients()
    {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        } 

        $results = ModelPersonne::getAllClients();
        include 'config.php';
        $vue = $root . '/app/view/client/viewListeClients.php';
        if (DEBUG) {
            echo ("ControllerClient : listeClients : vue = $vue");
        }
        require ($vue);
    }

        public static function supprimerClient()
    {
        session_start();
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        // Récupérer l'ID de l'utilisateur à supprimer depuis le formulaire
        $id = $_GET['id'];
        $results = ModelPersonne::delete($id);

        // Réafficher la liste des clients mise à jour
        $results = ModelPersonne::getAll();
        include 'config.php';
        $vue = $root . '/app/view/client/viewListeClients.php';
        if (DEBUG) {
            echo ("ControllerClient : supprimerClient : vue = $vue");
        }
        require ($vue);
    }
}