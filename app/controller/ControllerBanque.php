<!-- ----- debut ControllerBanque -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';
class ControllerBanque
{
    // --- page d'accueil
    public static function Accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerBanque : Accueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des banques
    public static function BanqueReadAll()
    {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadAll : vue = $vue");
        require ($vue);
    }

    //tous les comptes d'une même banque
    public static function banqueCompte()
    {
        // Vérifiez si l'identifiant de la banque est passé dans l'URL
        if (isset($_GET['id'])) {
            // Récupérez l'identifiant de la banque depuis l'URL
            $banque_id = $_GET['id'];
            // Appelez la méthode getByBanque du modèle ModelCompte pour récupérer les comptes par banque
            $comptes = ModelCompte::getByBanque($banque_id);
            // Vérifiez si des comptes ont été récupérés
            if ($comptes !== null) {
                // Construction du chemin de la vue
                include 'config.php';
                $vue = $root . '/app/view/banque/viewBanqueCompte.php';
                if (DEBUG)
                    echo ("ControllerBanque : BanqueCompte : vue = $vue");
                // Incluez la vue pour afficher les comptes par banque
                require ($vue);
            } else {
                // Si aucun compte n'a été trouvé, redirigez vers la vue de sélection de banque
                header("Location: router1.php?action=selectBanque");
                exit; // Assurez-vous de terminer l'exécution du script après la redirection
            }
        } else {
            // Si l'identifiant de la banque n'est pas passé dans l'URL, redirigez également vers la vue de sélection de banque
            header("Location: router1.php?action=selectBanque");
            exit; // Assurez-vous de terminer l'exécution du script après la redirection
        }
    }


    //selectionner une banque
    public static function selectBanque()
    {
        $results = ModelBanque::getAll();
        include 'config.php';
        $vue = $root . '/app/view/banque/viewSelectBanque.php';
        if (DEBUG)
            echo ("ControllerBanque : selectBanque : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function banqueReadId()
    {
        $results = ModelBanque::getAllId();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewId.php';
        require ($vue);
    }

    // Affiche une banque particulière (id)
    public static function banqueReadOne()
    {
        $banque_id = $_GET['id'];
        $results = ModelBanque::getOne($banque_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un banque
    public static function banqueCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'une nouvelle banque.
    // La clé est gérée par le système et pas par l'internaute
    public static function banqueCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelBanque::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['pays'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInserted.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerBanque -->
