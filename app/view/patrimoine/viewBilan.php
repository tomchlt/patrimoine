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
        <tr>
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
                "<tr><td>compte</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $compte['compte_label'],
                $compte['montant'],
                $capital,
              );
            }
          } else {
            echo ("<tr><td colspan='3'>Vous n'avez pas de compte</td></tr>");
          }
          if ($residences) {
            foreach ($residences as $residence) {
              $capital += $residence['prix'];
              printf(
                "<tr><td>résidence</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $residence['residence_label'],
                $residence['prix'],
                $capital,
              );
            }
          } else {
            echo ("<tr><td colspan='3'>Vous n'avez pas de résidence</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
</body>
