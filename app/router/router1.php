
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerCompte.php');
require ('../controller/ControllerResidence.php');

require ('../controller/ControllerLogin.php');
require ('../controller/ControllerClient.php');
require ('../controller/ControllerAdmin.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
$action = $param['action'];
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
    ControllerCompte::$action();
    break;
  case "listeResidences":
  case "mesResidences":
    ControllerResidence::$action();
    break;
  //connexion
  case "connexion":
  case "connexionError":
  case "connexionLogge":
  case "deconnexion":
  case "inscription":
  case "inscriptionError":
  case 'inscriptionLogge';
    ControllerLogin::$action();
    break;
  // Tache par défaut
  default:
    $action = "Accueil";
    ControllerLogin::$action();
}
?>
<!-- ----- Fin Router1 -->

