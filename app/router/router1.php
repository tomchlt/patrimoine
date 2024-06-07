
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerPersonne.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
  case "banqueReadAll":
  case "banqueReadOne":
  case "banqueReadId":
  case "banqueCreate":
  case "banqueCreated":
  case "selectBanque":
    ControllerBanque::$action();
    include '../view/viewSelectBanque.php';
    break;
  case "banqueCompte":
    ControllerBanque::banqueCompte();
    include '../view/viewBanqueCompte.php';
    break;
  case "connexion":
    ControllerPersonne::connexion();
    include '../view/viewConnexion.php';
    break;
    case "listeClients":
      ControllerPersonne::listeClients();
    break;
  case "listeAdmins":
    ControllerPersonne::listeAdmins();
    break;

  // Tache par défaut
  default:
    $action = "Accueil";
    ControllerBanque::$action();
}
?>
<!-- ----- Fin Router1 -->

