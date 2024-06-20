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
            <input type="hidden" name='action' value='transfertDone'>  
            <div class="row align-items-center">
                <div class="form-group">
                    <label for="compteDebite_id" class="col-form-label" style="font-weight: bold; width:300px">Sélectionnez le compte à débiter :</label>
                    <select class="form-control" id='compteDebite_id' name='compteDebite_id' style="width: 300px">
                    <?php
                    foreach ($comptes as $compteDebite) {
                        echo ("<option value='{$compteDebite['compte_id']}'>{$compteDebite['label']}</option>");
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="form-group">
                    <label for="compteCredite_id" class="col-form-label" style="font-weight: bold; width:300px">Sélectionnez le compte à créditer :</label>
                    <select class="form-control" id='compteCredite_id' name='compteCredite_id' style="width: 300px">
                    <?php
                    foreach ($comptes as $compteCredite) {
                        echo ("<option value='{$compteCredite['compte_id']}'>{$compteCredite['label']}</option>");
                    }
                    ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-1">
                    <label for="montant" class="col-form-label" style="font-weight: bold; width:200px">Montant :</label>
                </div>
                <div class="col-3">
                    <input type="number" id="montant" name="montant" class="form-control" style="width: 200px" min=0 required>
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
