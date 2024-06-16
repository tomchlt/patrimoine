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
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelPersonne::getAll();
        include 'config.php';
        $vue = $root . '/app/view/clien/viewListeClients.php';
        if (DEBUG) {
            echo ("ControllerClient : listeClients : vue = $vue");
        }
        require ($vue);
    }

    //     public static function supprimerClient()
    // {
    //     session_start();
    //     $login = $_SESSION['login'];
    //     $tempUser = ModelPersonne::getOneLogin($login);

    //     // Récupérer l'ID de l'utilisateur à supprimer depuis le formulaire
    //     $id = $_POST['id'];
    //     $results = ModelPersonne::delete($id);

    //     // Réafficher la liste des clients mise à jour
    //     $results = ModelPersonne::getAll();
    //     include 'config.php';
    //     $vue = $root . '/app/view/clien/viewListeClients.php';
    //     if (DEBUG) {
    //         echo ("ControllerClient : ListeClients : vue = $vue");
    //     }
    //     require ($vue);
    // }
}