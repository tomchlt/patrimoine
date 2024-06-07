<!-- ----- debut ControllerPersonne -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerPersonne -----
class ControllerPersonne
{
    public static function connexion()
    {
        include 'config.php'; // Assurez-vous que $root est défini correctement dans config.php
        $vue = $root . './app/view/connexion/viewConnexion.php'; // Chemin vers la vue de connexion
        if (DEBUG)
            echo ("ControllerPersonne : connexion : vue = $vue");
        require ($vue);
    }

    // public static function processLogin()
    // {
    //     // Vérification des données postées
    //     if (isset($_POST['login']) && isset($_POST['password'])) {

    //         $login = $_POST['login'];
    //         $password = $_POST['password'];


    //         var_dump($login, $password);
    //         // Vérification dans la base de données
    //         $personne = ModelPersonne::getByLoginAndPassword($login, $password);

    //         var_dump($personne);

    //         if ($personne) {
    //             // L'utilisateur existe dans la base de données
    //             // Redirection vers une page de succès ou une page d'accueil
    //             header("Location: ../view/viewAccueil.php");
    //             exit();
    //         } else {
    //             // L'utilisateur n'existe pas dans la base de données
    //             // Redirection vers la page de connexion avec un message d'erreur
    //             header("Location: ../view/viewConnexion.php");
    //             exit();
    //         }
    //     }
    // }

    public static function listeClients() {
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
        $results = ModelPersonne::getAllAdmins();
        include 'config.php';
        $vue = $root . '/app/view/clien/viewlisteAdmins.php';
        if (DEBUG) {
            echo ("ControllerPersonne : listeAdmins : vue = $vue");
        }
        require($vue);
    }

}

?>
<!-- ----- fin ControllerPersonne -->
