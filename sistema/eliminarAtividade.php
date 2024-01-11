<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php

require 'classes/Usuario.php';
$u = new Usuario();

$codigoAtividade = $_GET['codigoAtividade'];
$codigo = $_GET['codigo'];

$u->eliminarAtividade($codigoAtividade);

header('location: pagAtividades.php?codigo=' . $codigo);

?>