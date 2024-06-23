<!-- ----- début viewListeAdmins.php ----- -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h3>Liste des administrateurs</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Login</th>
          <th scope="col">Password</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // La liste des clients est dans une variable $results         
        foreach ($results as $element) {
          printf(
            "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
            $element->getNom(),
            $element->getPrenom(),
            $element->getLogin(),
            $element->getPassword()
          );
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
<!-- ----- fin viewListeAdmins.php ----- -->