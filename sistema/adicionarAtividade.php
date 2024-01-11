<?php

require 'classes/Usuario.php';

$u = new Usuario();

$codigoTurma = trim($_POST['codigo_turma']);
$nomeAtividade = trim($_POST['nome_atividade']);

$u->cadastrarAtividade($nomeAtividade, $codigoTurma);

header('Location: pagAtividades.php?codigo=' . $codigoTurma);