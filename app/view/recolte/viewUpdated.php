<?php
require $root . '/app/view/fragment/fragmentCaveHeader.html';
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        <h3>La récolte a été mise à jour.</h3>
        <ul>
            <?php
            echo "<li>vin_id = $vin_id</li>";
            echo "<li>producteur_id = $producteur_id</li>";
            echo "<li>quantite = $quantite</li>";
            ?>
        </ul>
        <br>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
