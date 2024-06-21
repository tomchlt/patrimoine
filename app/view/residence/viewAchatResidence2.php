<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?> 

    <h3>Achat de la résidence <?php echo $residence['label']; ?></h3>
    <form role="form" method='get' action='router1.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='achatResidenceDone'>  
            <div class="row align-items-center">
                <div class="form-group">
                    <label for="compteAcheteur_id" class="col-form-label" style="font-weight: bold; width:300px">Sélectionnez un compte de l'acheteur</label>
                    <select class="form-control" id='compteAcheteur_id' name='compteAcheteur_id' style="width: 300px">
                    <?php
                    foreach ($comptesAcheteur as $compteAcheteur) {
                        echo ("<option value='{$compteAcheteur['compte_id']}'>{$compteAcheteur['label']}</option>");
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="form-group">
                    <label for="compteVendeur_id" class="col-form-label" style="font-weight: bold; width:300px">Sélectionnez un compte du vendeur</label>
                    <select class="form-control" id='compteVendeur_id' name='compteVendeur_id' style="width: 300px">
                    <?php
                    foreach ($comptesVendeur as $compteVendeur) {
                        echo ("<option value='{$compteVendeur['compte_id']}'>{$compteVendeur['label']}</option>");
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="form-group">
                    <label for="prix" class="col-form-label" style="font-weight: bold; width:300px">Prix de la résidence</label>
                    <input type="number" id="prix" name="prix" class="form-control" style="width: 300px" min=0 value="<?php echo $residence['prix']; ?>" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="residence_id" value="<?php echo $residenceId; ?>">
        <br>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
