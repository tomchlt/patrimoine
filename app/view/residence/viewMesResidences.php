<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
    <h3>Résidences de <?php printf("%s %s", $tempUser->getPrenom(), $tempUser->getNom()); ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Label de la résidence</th>
          <th scope="col">Ville</th>
          <th scope="col">Prix (€)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if ($results) {
            foreach ($results as $resi) {
              printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                $resi['residence_label'],
                $resi['ville'],
                $resi['prix'],
              );
            }
          } else {
            echo ("<tr><td colspan='3' class='text-center'>Vous n'avez pas de résidence</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
  <!-- ----- fin viewMesRésidences -->
</body>
