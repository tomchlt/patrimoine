
<!-- ----- début viewAddCompte -->
 
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
        <input type="hidden" name='action' value='compteCreated'>  
        <div class="row align-items-center">
                    <div class="col-1">
                        <label for="label" class="col-form-label" style="font-weight: bold; width:250px">Label :</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="label" name="label" class="form-control" required>
                    </div>
                </div>   <br>                                  
      <div class="row align-items-center">
                    <div class="col-1">
                        <label for="montant" class="col-form-label" style="font-weight: bold; width:250px">Montant :</label>
                    </div>
                    <div class="col-3">
                        <input type="number" id="montant" name="montant" class="form-control" required>
                    </div>
                </div>                                     
      </div>
      <p/>
      <div class="row align-items-center">
        <div class="form-group">
            <label for="banque_id" class="col-form-label" style="font-weight: bold; width:250px">Sélectionnez une banque :</label>
            <select class="form-control" id='banque_id' name='banque_id' style="width: 200px">
            <?php
            foreach ($results as $banque) {
              echo ("<option value='{$banque->getId()}'>{$banque->getLabel()}</option>");
            }
            ?>
            </select>
            </div>
        </div>
       <br/> 
       <?php
       session_start();
       $login = $_SESSION['login'];
       $tempUser = ModelPersonne::getOneLogin($login);

       $idP = $tempUser->getId();

       echo ('<input type="hidden" name="personne_id" value="' . $idP . '">');
       ?>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAddCompte -->



