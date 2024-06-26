<!-- ----- début viewListeResidences.php ----- -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Liste des résidences</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Propriétaire</th>
          <th scope="col">Label</th>
          <th scope="col">Ville</th>
          <th scope="col" class="text-end">Prix (€)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results as $residence) {
          printf(
            "<tr><td>%s %s</td><td>%s</td><td>%s</td><td class='text-end'>%s</td></tr>",
            $residence['nom'],
            $residence['prenom'],
            $residence['label'],
            $residence['ville'],
            number_format($residence['prix'], 2, ",", " ")
          );
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
<!-- ----- fin viewListeResidences.php ----- -->
