
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
     echo ("<h3>La nouvelle banque a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>pays = " . $_GET['pays'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la banque</h3>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>pays = " . $_GET['pays'] . "</li>");
    }
    echo ("<br>");

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    