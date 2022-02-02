<?php
include 'init.php';

$pretragaMaterijal = trim($_GET['pretragaMaterijal']);
$pretragaSortiranje = trim($_GET['pretragaSortiranje']);

$podaci = $konekcija->pretrazi($pretragaMaterijal, $pretragaSortiranje);

?>

<table class="table table-dark">
    <thead>
        <tr>
            <th>Model</th>
            <th>Opis</th>
            <th>Gramaza</th>
            <th>Pol</th>
            <th>Materijal</th>
        </tr>
    </thead>
    <tbody>
        <?php

            foreach ($podaci as $materijal){
                ?>

                <tr>
                    <td><?= $materijal->model ?></td>
                    <td><?= $materijal->opis ?></td>
                    <td><?= $materijal->gramaza ?></td>
                    <td><?= $materijal->pol ?></td>
                    <td><?= $materijal->tipMaterijala ?></td>
                </tr>

        <?php
            }

        ?>
    </tbody>
</table>
