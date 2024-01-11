<?php

require 'classes/Usuario.php';

$u = new Usuario();

$usuario = trim($_POST['usuario']);
$nomeTurma = trim($_POST['nome_turma']);

$u->cadastrarTurma($nomeTurma, $usuario);

header('Location: pagInicial.php');