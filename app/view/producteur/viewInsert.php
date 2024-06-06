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
                <input type='hidden' name='action' value='producteurCreated'>
                <label class="w-25" for="id">nom : </label>
                <input type="text" name="nom" value="Matringe">
                <br>
                <label class="w-25" for="id">prenom : </label>
                <input type="text" name="prenom" value="Jean">
                <br>
                <label class="w-25" for="id">region : </label>
                <input type="text" name="region" value="Beaujolais">
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
