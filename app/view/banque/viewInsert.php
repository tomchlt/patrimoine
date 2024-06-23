
<!-- ----- début viewInsert -->
 
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?> 
    <h3>Ajout d'une banque</h3>
    <br>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueCreated'>      
        <div class="row align-items-center">
              <div class="col-1">
                    <label for="label" class="col-form-label" style="font-weight: bold; width:250px">Label :</label>
              </div>
              <div class="col-3">
                  <input type="text" name='label' size='75' class="form-control" required>
              </div>
        </div><br/>     
        <div class="row align-items-center">
              <div class="col-1">
                    <label for="pays" class="col-form-label" style="font-weight: bold; width:250px">Pays :</label>
              </div>
              <div class="col-3">
                  <input  type="text" name='pays' class="form-control" required>
              </div>
        </div><br/>     
      </div>
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    <br>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



