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
      echo ("<h3>Le transfert a été effectué : </h3>");
      echo ("<ul>");
      echo ("<li>id du compte débité = " . $_GET['compteDebite_id'] . "</li>");
      echo ("<li>id du compte crédité = " . $_GET['compteCredite_id'] . "</li>");
      echo ("<li>montant du transfert = " . $_GET['montant'] . "</li>");
      echo ("</ul>");
    } else {
      echo ("<h3>Problème lors du transfert</h3>");
      echo ("<p>Le transfert a été annulé</p>");
      echo ("<ul>");
      echo ("<li>id du compte à débiter = " . $_GET['compteDebite_id'] . "</li>");
      echo ("<li>id du compte à créditer = " . $_GET['compteCredite_id'] . "</li>");
      echo ("</ul>");
    }

    echo ("</div>");

    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
