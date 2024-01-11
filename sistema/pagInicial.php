<?php

include 'protect.php';
require 'classes\Usuario.php';

$usuario = $_SESSION['usuario'];

$t = new Usuario();

$turmas = [];

$turmas = $t->listarTurma($usuario);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Tela Inicial</title>
</head>
<body>

    <nav class = "nav-bar">

        <div id="box1-nav">
            <h1><a a class = "link" href="pagInicial.php"><?php echo $usuario; ?></a></h1>
            <a class = "link" id="item-box1" href="pagAddTurma.php">Adicionar Turma</a>
        </div>

        <a class = "link" id = "link-finalizarSession" href="finalizarSession.php">Sair</a>

    </nav>  

    <div class="container">

        <h2 class="titulo-table">Turmas</h2>
        <table id = "table">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nome</th>
                    <th colspan = "2">Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($turmas as $turma) { ?>
        
                  <tr>
                      <td><?php echo $turma->codigo_turma; ?></td>
                      <td><?php echo $turma->nome_turma; ?></td>
        
                      <td><a href="eliminarTurma.php?codigoTurma=<?php echo $turma->codigo_turma; ?>"><button class="btn" id="btn-turmas-excluir"><i class="fa-solid fa-trash"></i></button></a></td>
        
                      <td><a href="pagAtividades.php?codigo=<?php echo $turma->codigo_turma; ?>"><button class="btn" id="btn-turmas-vizualizar"><i class="fa-solid fa-circle-info"></i></button></a></td>
                  </tr>
        
                  <?php } ?>
            </tbody>
        </table>

    </div>

</body>
</html>