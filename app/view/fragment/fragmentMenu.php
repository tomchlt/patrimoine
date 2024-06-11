<nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">

  <?php
  if ($_SESSION['login'] === 'NULL') {
    echo ('<a class="navbar-brand" href="router1.php?action=Accueil">CHARLOT - GODEFROY</a>');
  } else {
    $userType = '';
    $Name = $tempUser->getNom() . " " . $tempUser->getPrenom();

    // Affichage différencié selon le type d'utilisateur
    switch ($tempUser->getStatut()) {
      case ModelPersonne::ADMINISTRATEUR:
        $userType = "administrateur";
        break;
      case ModelPersonne::USER:
        $userType = "CLIENT";
        break;
      default:
        $userType = '';
        break;
    }

    echo ('<a class="navbar-brand" href="router1.php?action=Accueil">CHARLOT - GODEFROY | ' . $Name . ' | ' . $userType . ' </a>');
  }
  ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <?php
      if ($_SESSION['login'] != 'NULL') {

        $menuContent = '';
        // -------- ADMINISTRATEUR -------
        if ($tempUser->getStatut() == ModelPersonne::ADMINISTRATEUR) {

          $menuContent = '        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">BANQUE</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router1.php?action=banqueReadAll">Liste des banques</a></li>
              <li><a class="dropdown-item" href="router1.php?action=banqueCompte">Comptes par banque</a></li>
              <li><a class="dropdown-item" href="router1.php?action=banqueCreate">Ajouter une banque</a></li> 
            </ul>
          </li>
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">CLIENTS</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router1.php?action=listeClients">Liste des clients</a></li>
              <li><a class="dropdown-item" href="router1.php?action=listeAdmins">Liste des administrateurs</a></li>
              <li><a class="dropdown-item" href="router1.php?action=listeComptes">Liste des comptes</a></li>
              <li><a class="dropdown-item" href="router1.php?action=listeResidences">Liste des résidences</a></li>
            </ul>
          </li>';
        }
        if ($tempUser->getStatut() == ModelPersonne::USER) {
          $menuContent = '
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">MES COMPTES BANCAIRES</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router1.php?action=">Liste de mes comptes</a></li>
              <li><a class="dropdown-item" href="router1.php?action=">Ajouter un nouveau compte</a></li>
              <li><a class="dropdown-item" href="router1.php?action=">Transfert Inter-comptes</a></li> 
            </ul>
          </li>';
        }
        echo $menuContent;
      }
      ?>
        <!-- CONNEXION-->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">CONNEXION</a>
            <ul class="dropdown-menu">
              <?php 
              if ($_SESSION['login'] === 'NULL') {
                echo ('              <li><a class="dropdown-item" href="router1.php?action=connexion">Connexion</a></li>
              <li><a class="dropdown-item" href="router1.php?action=inscription">Inscription</a></li>');
              } else {
                echo ('<li><a class="dropdown-item" href="router1.php?action=deconnexion">Se déconnecter</a></li>');
              }
              ?>
            </ul>
        </li>
      
      </ul>
    </div>
  </div>
</nav> 