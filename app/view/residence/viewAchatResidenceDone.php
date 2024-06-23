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
      echo ("<h3>L'achat a été effectué</h3>");
      echo ("<ul>");
      echo ("<li>id de la résidence = " . $_GET['residence_id'] . "</li>");
      echo ("<li>id du compte de l'acheteur = " . $_GET['compteAcheteur_id'] . "</li>");
      echo ("<li>id du compte du vendeur = " . $_GET['compteVendeur_id'] . "</li>");
      echo ("<li>prix de la résidence = " . $_GET['prix'] . "</li>");
      echo ("</ul>");
    } else {
      echo ("<h3>Problème lors de l'achat</h3>");
      echo ("<p>L'achat a été annulé</p>");
      echo ("<ul>");
      echo ("<li>id de la résidence = " . $_GET['residence_id'] . "</li>");
      echo ("<li>id du compte de l'acheteur = " . $_GET['compteAcheteur_id'] . "</li>");
      echo ("<li>id du compte du vendeur = " . $_GET['compteVendeur_id'] . "</li>");
      echo ("</ul>");
    }
    echo ("<br>");

    echo ("</div>");

    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
