<?php

require 'classes/Usuario.php';
$u = new Usuario();

$codigoTurma = $_GET['codigoTurma'];

$u->eliminarTurma($codigoTurma);

header('location: pagInicial.php');

?>