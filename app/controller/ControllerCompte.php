<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerCompte -----
class ControllerCompte
{

    public static function addCompte()
    {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        } 

        // $personne_id = $tempUser['id'];
        $results = ModelBanque::getAll();

        include 'config.php';
        $vue = $root . '/app/view/compte/viewAddCompte.php';
        if (DEBUG) {
            echo ("ControllerCompte : addCompte : vue = $vue");
        }
        require ($vue);

    }

    // Affiche un formulaire pour récupérer les informations d'une nouvelle banque.
    public static function compteCreated()
    {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        } 

        // ajouter une validation des informations du formulaire
        $results = ModelCompte::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['montant']),
            htmlspecialchars($_GET['banque_id']),
            htmlspecialchars($_GET['personne_id']),
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInserted.php';
        require ($vue);
    }
    public static function mesComptes()
    {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        } 

        $comptes = ModelCompte::getByLogin($login);
        include 'config.php';
        $vue = $root . '/app/view/compte/viewMesComptes.php';
        if (DEBUG) {
            echo ("ControllerCompte : mesComptes : vue = $vue");
        }
        require ($vue);
    }

    public static function listeComptes()
    {
        // Récupération des données de l'user connecté
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        } 
        $results = ModelCompte::getAllWithDetails();
        include 'config.php';
        $vue = $root . '/app/view/compte/viewListeComptes.php';
        if (DEBUG) {
            echo ("ControllerCompte : listeComptes : vue = $vue");
        }
        require ($vue);
    }

    public static function transfert() {
        session_start();
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        $comptes = ModelCompte::getAllByLogin($login);

        include 'config.php';
        if (count($comptes)>1) {
            $vue = $root . '/app/view/compte/viewTransfert.php';
        } else {
            $vue = $root . '/app/view/compte/viewTransfertError.php';
        }

        if (DEBUG) {
            echo ("ControllerCompte : transfert : vue = $vue");
        }
        require ($vue);
    }

    public static function transfertDone() {
        session_start();
        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
        }

        if (htmlspecialchars($_GET['compteDebite_id']) != htmlspecialchars($_GET['compteCredite_id'])) {
            $results = ModelCompte::transfer(
                htmlspecialchars($_GET['compteDebite_id']),
                htmlspecialchars($_GET['compteCredite_id']),
                htmlspecialchars($_GET['montant']),
            );
        } else {
            $results = NULL;
        }

        include 'config.php';
        $vue = $root . '/app/view/compte/viewTransfertDone.php';
        if (DEBUG) {
            echo ("ControllerCompte : transfert : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerCompte -->
