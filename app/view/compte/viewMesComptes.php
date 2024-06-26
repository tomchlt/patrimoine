<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
    <h3>Comptes bancaires de <?php printf("%s %s", $tempUser->getPrenom(), $tempUser->getNom()); ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Banque</th>
          <th scope="col">Label du compte</th>
          <th scope="col" class="text-end">Montant (€)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if ($comptes) {
            foreach ($comptes as $compte) {
              printf(
                "<tr><td>%s</td><td>%s</td><td class='text-end'>%s</td></tr>",
                $compte['banque_nom'],
                $compte['compte_label'],
                number_format($compte['montant'], 2, ",", " ")
              );
            }
          } else {
            echo ("<tr><td colspan='3' class='text-center'>Vous n'avez pas de compte</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
  <!-- ----- fin viewMesComptes -->
</body>
