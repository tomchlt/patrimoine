<!-- ----- debut ControllerLogin -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerLogin-----
class ControllerLogin
{

    // ---- Accueil

    public static function Accueil()
    {
        // Récupération des données de l'user connecté
        session_start();
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerLogin : Accueil : vue = $vue");
        require ($vue);
    }

    // ---- Affiche le formulaire de connexion Log In
    public static function connexion()
    {
        // Récupération des données de l'user connecté
        session_start();
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewConnexion.php';
        if (DEBUG)
            echo ("ControllerLogin: connexion : vue = $vue");
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

            include 'config.php';
            $vue = $root . '/app/view//viewAccueil.php';
            if (DEBUG)
                echo ("ControllerLogin : viewAccueil : vue = $vue");
            require ($vue);
        }
        // Identifiants erronés
        else {
            include 'config.php';
            $vue = $root . '/app/view/connexion/viewConnexionError.php';
            if (DEBUG)
                echo ("ControllerLogin : viewConnexionError : vue = $vue");
            require ($vue);
        }
    }

    // Affiche le résultat d'une connexion ratée
    public static function connexionError()
    {
        // Récupération des données de l'user connecté
        session_start();
        if (!isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewConnexionError.php';
        if (DEBUG)
            echo ("ControllerLogin : viewConnexionError : vue = $vue");
        require ($vue);
    }

    // ---- Déconnexion de l'user : affichage de la page d'accueil
    public static function deconnexion()
    {
        session_start();
        unset($_SESSION['login']);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerLogin : Accueil : vue = $vue");
        require ($vue);
    }

    // ---- Inscription : affiche le formulaire d'inscription
    public static function inscription()
    {
        // Récupération des données de l'user connecté
        session_start();
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        $results = ModelPersonne::getAll();

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewInscription.php';
        require ($vue);
    }

    // ---- Inscription : affiche le résultat de la tentative d'inscription
    public static function inscriptionLogge()
    {
        // Vérifications des identifiants
        $signInResults = ModelPersonne::checkLogin($_GET['login']);

        // Bons identifiants
        if ($signInResults == null) {
            $results = ModelPersonne::insert(
                htmlspecialchars($_GET['nom']),
                htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['statut']),
                htmlspecialchars($_GET['login']),
                htmlspecialchars($_GET['password'])
            );
            include 'config.php';
            $vue = $root . '/app/view/connexion/viewInscriptionInserted.php';
            require ($vue);
        }
        // Identifiants erronés
        else {
            $results = ModelPersonne::getAll();
            include 'config.php';
            $vue = $root . '/app/view/connexion/viewInscriptionError.php';
            if (DEBUG)
                echo ("ControllerLogin : viewInscriptionError : vue = $vue");
            require ($vue);
        }
    }


    // ---- Inscription : affiche le résultat de la tentative d'inscription
    public static function inscriptionError()
    {
        // Vérifications des identifiants
        session_start();


        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewInscriptionError.php';
        if (DEBUG)
            echo ("ControllerLogin : viewInscriptionError : vue = $vue");
        require ($vue);
    }

}

?>
<!-- ----- fin ControllerLogin-->