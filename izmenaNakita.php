<?php
include 'init.php';

$id = trim($_POST['id']);
$gramaza = trim($_POST['gramaza']);

if($konekcija->izmeniGramazu($id, $gramaza)){
    echo "Uspesno ste izmenili gramazu nakita";
}else{
    echo "Doslo je od greske pri izmeni gramaze nakita";
}
