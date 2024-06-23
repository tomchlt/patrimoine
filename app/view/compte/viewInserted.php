
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
      echo ("<h3>Le nouveau compte a été ajouté</h3>");
      echo ("<ul>");
      echo ("<li>id = " . $results . "</li>");
      echo ("<li>label = " . $_GET['label'] . "</li>");
      echo ("<li>montant = " . $_GET['montant'] . "</li>");
      echo ("</ul>");
    } else {
      echo ("<h3>Problème d'insertion du compte</h3>");
      echo ("id = " . $_GET['id']);
    }
    echo ("<br>");

    echo ("</div>");

    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    