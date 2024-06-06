<?php
require $root . '/app/view/fragment/fragmentCaveHeader.html';
?>
<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">region</th>
                    <th scope="col">nombre de producteurs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $tuple) {
                    printf("<tr><td>%s</td><td>%d</td></tr>", $tuple['region'], $tuple['count(id)']);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
