<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">prénom</th>
          <th scope="col">nom</th>
          <th scope="col">banque</th>
          <th scope="col">compte</th>
          <th scope="col">montant (€)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if (count($comptes)) {
            foreach ($comptes as $compte) {
              printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $compte->getPersonnePrenom(),
                $compte->getPersonneNom(),
                $compte->getBanqueNom(),
                $compte->getLabel(),
                $compte->getMontant()
              );
            }
          } else {
            echo ("il n'y a pas de compte pour cette banque");
          }
          // La liste des comptes est dans une variable $comptes
          
          ?>
      </tbody>
    </table>
  </div>

  <!-- ----- fin viewAll -->
</body>
