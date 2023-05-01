<?php
date_default_timezone_set('Africa/Luanda');
$hora_publicacao = date('H:i:s');         
$hora_publicacao = date('Y/m/d');   


$data = strtotime($hora_publicacao);

echo date('d/m/Y', $data);
?>