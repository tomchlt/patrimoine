<?php
include ('../ModelBanque.php');
include ('../ModelCompte.php');
include ('../ModelPersonne.php');
?>

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
    <h3>Compte de : <?php echo ($_SESSION['login']) ?></h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Banque</th>
          <th scope="col">Label du compte</th>
          <th scope="col">Montant (€)</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if ($comptes) {
            foreach ($comptes as $compte) {
              var_dump($compte);
              printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                $compte['banque_nom'],
                $compte['compte_label'],
                $compte['montant'],
              );
            }
          } else {
            echo ("<tr><td colspan='3'>Vous n'avez pas de compte</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>

  <!-- ----- fin viewMesComptes -->
</body>
