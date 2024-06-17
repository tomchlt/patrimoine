
<!-- ----- début viewClientDeleted -->
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
     echo ("<h3>Le client  a été supprimé </h3>");
     echo("<ul>");
     echo ("<li>id client = " . $results . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème lors de la suppression du client</h3>");
     echo ("id = " . $_GET['id']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewClientDeleted -->    

    
    