<?php
error_reporting(E_ALL);
ini_set('display_errors', false);
ini_set("log_errors", true);
ini_set("error_log", "logovi.log");

require 'Konekcija.php';

$konekcija = new Konekcija();