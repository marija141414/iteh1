<?php
include 'init.php';

$podaci = $konekcija->vratiSve('nakit');

    foreach ($podaci as $nakit){
        ?>

        <option value="<?= $nakit->id ?>"><?= $nakit->model ?></option>

<?php
    }

?>
