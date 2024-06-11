<!-- ----- début viewListeClients.php ----- -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <h1>Liste des admins</h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">nom</th>
          <th scope="col">prénom</th>
          <th scope="col">login</th>
          <th scope="col">password</th>
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
<!-- ----- fin viewListeClients.php ----- -->
