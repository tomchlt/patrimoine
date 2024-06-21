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
    <h1>Liste des clients</h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">nom</th>
          <th scope="col">prénom</th>
          <th scope="col">login</th>
          <th scope="col">password</th>
          <th scope="col">gestionnaire clients</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // La liste des clients est dans une variable $results         
        foreach ($results as $element) {
          printf(
            "<tr>
              <td>%s</td>
              <td>%s</td>
              <td>%s</td>
              <td>%s</td>
              <td>
                 <form role='form' method='get' action='router1.php'>    
                  <input type='hidden' name='action' value='supprimerClient'>
                  <input type='hidden' name='id' value='%s'>
                  <button type='submit' class='btn btn-danger'>Supprimer</button>
                </form>
              </td>
            </tr>",
            $element->getNom(),
            $element->getPrenom(),
            $element->getLogin(),
            $element->getPassword(),
            $element->getId()
          );
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
<!-- ----- fin viewListeClients.php ----- -->
