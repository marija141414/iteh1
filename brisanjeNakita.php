<?php
include 'init.php';

$id = trim($_POST['id']);


if($konekcija->obrisiNakit($id)){
    echo "Uspesno ste obrisali nakit";
}else{
    echo "Doslo je od greske pri brisanju nakita";
}
