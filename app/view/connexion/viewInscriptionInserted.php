
<!-- ----- début viewInscriptionInserted -->
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
     echo ("<h3>Un nouveau client a été ajouté ! </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>prénom = " . $_GET['prenom'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du profil : </h3>");
     echo ("id = " . $_GET['id']);
    }

    echo ("<br>");
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInscriptionInserted -->    

    
    