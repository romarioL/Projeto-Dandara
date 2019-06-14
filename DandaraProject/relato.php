<?php 

require_once "vendor/autoload.php";

use App\ClassRelato;

$relato = new ClassRelato();

$relato->setNome($_POST['nome']);
$relato->setRelato($_POST['relato']);
$relato->setLatitude($_POST['latitude']);
$relato->setLongitude($_POST['longitude']);
$relato->relatar();
