<!-- viewBanqueCompte.php -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          <th scope = "col">montant</th>
          <th scope = "col">banque_id</th>
          <th scope = "col">personne_id</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des comptes est dans une variable $comptes
          foreach ($comptes as $compte) {
              printf(
                "<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $compte->getId(),
                $compte->getLabel(),
                $compte->getMontant(),
                $compte->getBanqueId(),
                $compte->getPersonneId()
              );
          }
          ?>
      </tbody>
    </table>
  </div>


  <!-- ----- fin viewAll -->
</body>
