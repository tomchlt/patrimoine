<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
    <h3>Liste des comptes de <?php echo $banque[0]->getLabel(); ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Prénom</th>
          <th scope="col">Nom</th>
          <th scope="col">Banque</th>
          <th scope="col">Compte</th>
          <th scope="col" class="text-end">Montant (€)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if (count($comptes)) {
            foreach ($comptes as $compte) {
              printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class='text-end'>%s</td></tr>",
                $compte->getPersonnePrenom(),
                $compte->getPersonneNom(),
                $compte->getBanqueNom(),
                $compte->getLabel(),
                number_format($compte->getMontant(), 2, ",", " ")
              );
            }
          } else {
            echo ("<tr><td colspan='5' class='text-center'>Il n'y a pas de compte pour cette banque</td></tr>");
          }
          // La liste des comptes est dans une variable $comptes
          
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
  <!-- ----- fin viewAll -->
</body>
