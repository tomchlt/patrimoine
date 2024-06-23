<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
    <h3>Patrimoine de <?php echo ($_SESSION['login']) ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr class='table-secondary'>
          <th scope="col">Catégorie</th>
          <th scope="col">Label</th>
          <th scope="col">Valeur (€)</th>
          <th scope="col">Capital (€)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $capital = 0;
          if ($comptes) {
            foreach ($comptes as $compte) {
              $capital += $compte['montant'];
              printf(
                "<tr class='table-primary'><td>compte</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $compte['compte_label'],
                $compte['montant'],
                $capital,
              );
            }
          }
          if ($residences) {
            foreach ($residences as $residence) {
              $capital += $residence['prix'];
              printf(
                "<tr class='table-info'><td>résidence</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $residence['residence_label'],
                $residence['prix'],
                $capital,
              );
            }
          }
          if (!$comptes && !$residences) {
            echo ("<tr><td colspan='4' class='text-center'>Vous n'avez pas de patrimoine</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
</body>
