<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.php';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <h3>Achat d'une résidence pour <?php printf("%s %s", $tempUser->getPrenom(), $tempUser->getNom()); ?></h3>
    <br>
    <form role="form" method='get' action='router1.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='achatResidence2'>  
            <div class="row align-items-center">
                <div class="form-group">
                    <label for="residence_id" class="col-form-label" style="font-weight: bold; width:300px">Sélectionnez une résidence à acheter</label>
                    <select class="form-control" id='residence_id' name='residence_id' style="width: 400px">
                    <?php
                    foreach ($residences as $residence) {
                        echo ("<option value='{$residence['id']}'>{$residence['label']} ({$residence['ville']})</option>");
                    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
