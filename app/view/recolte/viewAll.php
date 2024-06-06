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
                    <?php
                    $cols = $results[0];
                    $datas = $results[1];
                    $nbColumns = 0;
                    foreach ($cols as $col) {
                        echo "<th scope='col'>$col</th>";
                        $nbColumns++;
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datas as $data) {
                    echo "<tr>";
                    for ($i=0; $i<$nbColumns; $i++) {
                        echo "<td>$data[$i]</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <hr>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                    $cols = $results[2];
                    $datas = $results[3];
                    $nbColumns = 0;
                    foreach ($cols as $col) {
                        echo "<th scope='col'>$col</th>";
                        $nbColumns++;
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datas as $data) {
                    echo "<tr>";
                    for ($i=0; $i<$nbColumns; $i++) {
                        echo "<td>$data[$i]</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include $root . '/app/view/fragment/fragmentCaveFooter.html';
?>
