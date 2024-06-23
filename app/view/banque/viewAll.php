
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.php';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>
    <h3>Liste des banques</h3>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Label</th>
          <th scope = "col">Pays</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des banques est dans une variable $results         
            foreach ($results as $element) {
              printf(
                "<tr><td>%s</td><td>%s</td></tr>",
                $element->getLabel(),
                $element->getPays()
              );
            }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  