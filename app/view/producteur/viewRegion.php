<?php
require $root . '/app/view/fragment/fragmentCaveHeader.html';
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        <h3>Liste des régions des producteurs :</h3>
        <ul>
            <?php
            foreach ($results as $region) {
                printf("<li>%s</li>", $region);
            }
            ?>
        </ul>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
