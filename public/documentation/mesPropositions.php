<?php
require $root . '/app/view/fragment/fragmentCaveHeader.html';
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        <h3>Proposition d'amélioration des sources du projet</h3>
        <ol>
            <li>Ajouter les fonctions update et delete</li>
            <li>Modifier les vues pour qu'elles soient plus réutilisables</li>
        </ol>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
