<?php

include "init.php";

$materijali = $konekcija->vratiSve('materijal');
$polovi = $konekcija->vratiSve('pol');
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
                <div class="col-md-12 text-center">
                    <h3 id="odgovor"></h3>
                </div>
                <div class="col-md-4">
                    <h2>Unos nakita</h2>
                    <label for="modelUnos">Model</label>
                    <input type="text" id="modelUnos" class="form-control">
                    <label for="opisUnos">Opis</label>
                    <input type="text" id="opisUnos" class="form-control">
                    <label for="gramazaUnos">Gramaza</label>
                    <input type="text" id="gramazaUnos" class="form-control">
                    <label for="materijal">Materijal</label>
                    <select id="materijal" class="form-control">
                        <?php
                            foreach ($materijali as $materijal){
                                ?>
                                <option value="<?= $materijal->id ?>"><?= $materijal->tipMaterijala ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <label for="pol">Pol</label>
                    <select id="pol" class="form-control">
                        <?php
                        foreach ($polovi as $pol){
                            ?>
                            <option value="<?= $pol->id ?>"><?= $pol->pol ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <hr>
                    <button onclick="unesiNakit()" class="btn btn-dark">Unesi nakit</button>
                </div>

                <div class="col-md-4">
                    <h2>Izmeni gramazu nakita</h2>
                    <label for="nakitIzmena">Nakit</label>
                    <select id="nakitIzmena" class="form-control">

                    </select>
                    <label for="gramazaIzmena">Gramaza</label>
                    <input type="text" id="gramazaIzmena" class="form-control">
                    <hr>
                    <button onclick="izmeniNakit()" class="btn btn-dark">Izmeni gramazu nakita</button>
                </div>

                <div class="col-md-4">
                    <h2>Obrisi nakit</h2>
                    <label for="nakitBrisanje">Nakit</label>
                    <select id="nakitBrisanje" class="form-control">

                    </select>
                    <hr>
                    <button onclick="obrisiNakit()" class="btn btn-dark">Obrisi nakit</button>
                </div>
            </div>
        </div>

    <?php
         include 'footer.php';
    ?>

        <script src="js/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>
    <script>
        function popuniNakite() {

            $.ajax({
                url: 'komboNakiti.php',
                success: function (podaci) {
                    $("#nakitIzmena").html(podaci);
                    $("#nakitBrisanje").html(podaci);
                }
            });

        }

        popuniNakite();

        function unesiNakit() {
            let model = $('#modelUnos').val();
            let opis = $('#opisUnos').val();
            let gramaza = $('#gramazaUnos').val();
            let pol = $('#pol').val();
            let materijal = $('#materijal').val();

            $.ajax({
                url: 'unosNakita.php',
                type: 'post',
                data: {
                    model : model,
                    opis : opis,
                    gramaza : gramaza,
                    pol : pol,
                    materijal : materijal,
                },
                success: function (odgovor) {
                    $("#odgovor").html(odgovor);
                    popuniNakite();
                }
            });
        }

        function izmeniNakit() {
            let id = $('#nakitIzmena').val();
            let gramaza = $('#gramazaIzmena').val();

            $.ajax({
                url: 'izmenaNakita.php',
                type: 'post',
                data: {
                    id : id,
                    gramaza : gramaza,
                },
                success: function (odgovor) {
                    $("#odgovor").html(odgovor);
                    popuniNakite();
                }
            });
        }

        function obrisiNakit() {
            let id = $('#nakitBrisanje').val();

            $.ajax({
                url: 'brisanjeNakita.php',
                type: 'post',
                data: {
                    id : id,
                },
                success: function (odgovor) {
                    $("#odgovor").html(odgovor);
                    popuniNakite();
                }
            });
        }
    </script>
    </body>
</html>
