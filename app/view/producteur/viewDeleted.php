<?php
require $root . '/app/view/fragment/fragmentCaveHeader.html';
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        
        if ($results) {
            echo "<h3>Le producteur (id = $results) a été supprimé.</h3>";
        } else {
            echo "<h3>Problème de suppression du producteur. Il est probable qu'il soit présent dans la table des récoltes.</h3>";
        }
        ?>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
