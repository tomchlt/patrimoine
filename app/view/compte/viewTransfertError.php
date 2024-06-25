<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?> 
    <h3>Transfert entre vos comptes</h3>
    <br>
    <p style="color: #EB57A4; font-weight: bold">Vous devez avoir au moins 2 comptes pour pouvoir effectuer un transfert</p>
    <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
