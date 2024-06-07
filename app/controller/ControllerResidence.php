<?php
require_once '../model/ModelResidence.php';

class ControllerResidence
{
    public static function listeResidences()
    {
        $results = ModelResidence::getAllOrderedByPrix();
        include 'config.php';
        $vue = $root . '/app/view/residence/viewListeResidences.php';
        if (DEBUG) {
            echo ("ControllerResidence : listeResidences : vue = $vue");
        }
        require($vue);
    }
}
?>
