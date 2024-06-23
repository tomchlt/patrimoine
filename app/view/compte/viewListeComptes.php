<!-- ----- début viewListeComptes.php ----- -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Liste des comptes bancaires</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Nom du propriétaire</th>
          <th scope="col">Prénom du propriétaire</th>
          <th scope="col">Label de la banque</th>
          <th scope="col">Pays de la banque</th>
          <th scope="col">Label du compte</th>
          <th scope="col" class="text-end">Montant (€)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results as $compte) {
          printf(
            "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td class='text-end'>%s</td></tr>",
            $compte['nom'],
            $compte['prenom'],
            $compte['banque_label'],
            $compte['pays'],
            $compte['compte_label'],
            number_format($compte['montant'], 2, ",", " ")
          );
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
<!-- ----- fin viewListeComptes.php ----- -->
