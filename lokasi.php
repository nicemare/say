<?php

$id = $_GET['id'];
$long = $_POST['longitude'];
$lat = $_POST['latitude'];


$file = 'data/id_'.$id.'_lokasi.txt';


unlink($file);

$fp = fopen($file, 'a');

fwrite($fp, $long);
fwrite($fp, "-");
fwrite($fp, $lat);

fclose($fp);


?>