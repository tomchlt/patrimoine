<!-- ----- debut ControllerPersonne -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerPersonne -----
class ControllerPersonne
{
    // ---- Affiche le formulaire de connexion Log In
    public static function connexion()
    {
        // Récupération des données de l'user connecté
        session_start();
        if ($_SESSION['login'] != 'NULL') {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewConnexion.php';
        if (DEBUG)
            echo ("ControllerPersonne : connexion : vue = $vue");
        require ($vue);
    }


    public static function connexionLogge()
    {
        // Vérifications des identifiants
        session_start();
        $loginResults = ModelPersonne::checkIdentifiers($_GET['login'], $_GET['password']);

        // Bons identifiants
        if ($loginResults != null) {
            $_SESSION['login'] = $_GET['login'];
            $tempUser = ModelPersonne::getOneLogin($_SESSION['login']);
        }
        // Identifiants erronés
        else {
            include 'config.php';
            $vue = $root . '/app/view/connexion/viewConnexionError.php';
            if (DEBUG)
                echo ("ControllerPersonne : connexionError : vue = $vue");
            require ($vue);
            // header('Location: router.php?action=connexionError');
            // exit();
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerPersonne : connexionLogge : vue = $vue");
        require ($vue);
    }

    // Affiche le résultat d'une connexion ratée
    // public static function connexionError()
    // {
    //     // Récupération des données de l'user connecté
    //     session_start();
    //     if ($_SESSION['login'] != 'NULL') {
    //         $login = $_SESSION['login'];
    //         $tempUser = ModelPersonne::getOneLogin($login);
    //     }

    //     // Construction chemin de la vue
    //     include 'config.php';
    //     $vue = $root . '/app/view/connexion/viewConnexionError.php';
    //     if (DEBUG)
    //         echo ("ControllerPersonne : connexionError : vue = $vue");
    //     require ($vue);
    // }


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
            echo ("ControllerPersonne : listeClients : vue = $vue");
        }
        require ($vue);
    }

    public static function listeAdmins()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);
        
        $results = ModelPersonne::getAllAdmins();
        include 'config.php';
        $vue = $root . '/app/view/clien/viewlisteAdmins.php';
        if (DEBUG) {
            echo ("ControllerPersonne : listeAdmins : vue = $vue");
        }
        require ($vue);
    }

}

?>
<!-- ----- fin ControllerPersonne -->
