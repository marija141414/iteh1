<?php
include 'init.php';

$model = trim($_POST['model']);
$opis = trim($_POST['opis']);
$gramaza = trim($_POST['gramaza']);
$pol = trim($_POST['pol']);
$materijal = trim($_POST['materijal']);


if($konekcija->unesiNakit($model, $opis, $gramaza, $materijal, $pol)){
    echo "Uspesno ste uneli nakit";
}else{
    echo "Doslo je od greske pri unosu nakita";
}
