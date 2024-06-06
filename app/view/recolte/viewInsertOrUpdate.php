<?php
require $root . '/app/view/fragment/fragmentCaveHeader.html';
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        <form role='form' method='get' action='router2.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='recolteCreateOrUpdate'>
                <label class="fw-bold">Sélectionnez un vin :</label>
                <select class='form-control' id='vin_id' name='vin_id'>
                    <?php
                    $vins = $results[0];
                    foreach ($vins as $vin) {
                        $id = $vin->getId();
                        echo "<option value='$id'>";
                        printf("%d : %s : %d : %.2f", $id, $vin->getCru(), $vin->getAnnee(), $vin->getDegre());
                        echo "</option>";
                    }
                    ?>
                </select>
                <label class="fw-bold">Sélectionnez un producteur :</label>
                <select class='form-control' id='producteur_id' name='producteur_id'>
                    <?php
                    $producteurs = $results[1];
                    foreach ($producteurs as $producteur) {
                        $id = $producteur->getId();
                        echo "<option value='$id'>";
                        printf("%d : %s : %s : %s", $id, $producteur->getNom(), $producteur->getPrenom(), $producteur->getRegion());
                        echo "</option>";
                    }
                    ?>
                </select>
                <label class="fw-bold">quantité :</label>
                <br>
                <input type="number" id="quantite" name="quantite" value="10">
                <br>
            </div>
            <br>
            <button class='btn btn-primary' type='submit'>Valider</button>
        </form>
        <br>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
