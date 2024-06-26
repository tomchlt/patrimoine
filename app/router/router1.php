<!-- ----- début Router.php ----- -->
<?php
require '../controller/ControllerBanque.php';
require '../controller/ControllerCompte.php';
require '../controller/ControllerResidence.php';
require '../controller/ControllerLogin.php';
require '../controller/ControllerClient.php';
require '../controller/ControllerAdmin.php';
require '../controller/ControllerPatrimoine.php';

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
  case "banqueReadAll":
  case "banqueReadOne":
  case "banqueReadId":
  case "banqueCreate":
  case "banqueCreated":
  case "selectBanque":
  case "banqueCompte":
    ControllerBanque::$action();
    break;
  case "listeClients":
  case "supprimerClient":
    ControllerClient::$action();
    break;
  case "listeAdmins":
    ControllerAdmin::$action();
    break;
  case "listeComptes":
  case "mesComptes":
  case "addCompte":
  case "compteCreated":
  case "transfert":
  case "transfertDone":
    ControllerCompte::$action();
    break;
  case "listeResidences":
  case "mesResidences":
  case "achatResidence":
  case "achatResidence2":
  case "achatResidenceDone":
    ControllerResidence::$action();
    break;
  //connexion
  case "connexion":
  case "connexionError":
  case "connexionLogge":
  case "deconnexion":
  case "inscription":
  case "inscriptionError":
  case "inscriptionLogge":
    ControllerLogin::$action();
    break;
  case "bilan":
    ControllerPatrimoine::$action();
    break;
  // Tache par défaut
  default:
    $action = "Accueil";
    ControllerLogin::$action();
}
?>
<!-- ----- Fin Router.php ----- -->