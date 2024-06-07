<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelPersonne.php';

// ----- debut ControllerCompte -----
class ControllerCompte
{

    public static function listeComptes() {
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
