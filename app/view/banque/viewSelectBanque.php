<!-- viewSelectBanque.php -->

<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueCompte'>
        <label for="id">Sélectionnez une banque : </label>
        <select class="form-control" id='id' name='id' style="width: 200px">
          <?php
          foreach ($results as $banque) {
              echo ("<option value='{$banque->getId()}'>{$banque->getLabel()}</option>");
          }
          ?>
        </select>
        <br>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit</button>
    </form>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
</body>
