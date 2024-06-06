
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          <th scope = "col">pays</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des banques est dans une variable $results         
            foreach ($results as $element) {
              printf(
                "<tr><td>%d</td><td>%s</td><td>%s</td></tr>",
                $element->getId(),
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
  
  
  