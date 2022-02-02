<?php

include "init.php";

$materijali = $konekcija->vratiSve('materijal');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nakit - prvi domaci iz ITEH-a</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>

    <?php
        include 'meni.php';
    ?>

        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-5">
                    <label for="materijalPretraga">Pretraga po tipu materijala</label>
                    <select id="materijalPretraga" class="form-control">
                        <option value="BILO_KOJI_MATERIJAL">Svi materijali</option>
                        <?php
                            foreach ($materijali as $materijal){
                                ?>
                                <option value="<?= $materijal->id ?>"><?= $materijal->tipMaterijala ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="sortiranjePretraga">Sortiranje po gramazi</label>
                    <select id="sortiranjePretraga" class="form-control">
                        <option value="asc">Od najmanjeg ka najvecem</option>
                        <option value="desc">Od najveceg ka najmanjem</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="pretraga">Pretraga</label>
                    <button id="pretraga" class="btn btn-dark" onclick="pretraziNakite()">Pretrazi</button>
                </div>

            </div>

            <div class="row" id="rezultatPretrage" style="padding-top: 30px">

            </div>
        </div>

    <?php
         include 'footer.php';
    ?>

        <script src="js/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>
    <script>
        function pretraziNakite() {
            let pretragaMaterijal = $('#materijalPretraga').val();
            let pretragaSortiranje = $('#sortiranjePretraga').val();

            $.ajax({
                url: 'rezultatPretrage.php',
                data: {
                    pretragaMaterijal : pretragaMaterijal,
                    pretragaSortiranje : pretragaSortiranje
                },
                success: function (podaci) {
                    $("#rezultatPretrage").html(podaci);
                }
            });

        }

        pretraziNakite();
    </script>
    </body>
</html>
