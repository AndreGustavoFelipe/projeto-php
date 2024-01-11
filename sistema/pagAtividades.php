<?php

include 'protect.php';
require 'classes\Usuario.php';

$usuario = $_SESSION['usuario'];


if (isset($_GET['codigo'])) {

    $codigo = $_GET['codigo'];

}


$a = new Usuario();

$atividades = [];

$atividades = $a->listarAtividades($codigo);

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
            <h1><a a class = "link" href="pagAtividades.php?codigo=<?php echo $codigo; ?>"><?php echo $usuario; ?></a></h1>
            <a class = "link" id="item-box1" href="pagAddAtividade.php?codigoTurma=<?php echo $codigo; ?>">Adicionar Atividade</a> 
        </div>

        <a class = "link" id = "link-finalizarSession" href="finalizarSession.php">Sair</a>

    </nav>  
    
    <div class="container">

        <h2 class="titulo-table">Atividades</h2>
        <table id = "table">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($atividades as $atividade) { ?>
        
                  <tr>
                      <td><?php echo $atividade->codigo_atividade; ?></td>
                      <td><?php echo $atividade->nome_atividade; ?></td>
        
                      <td><a href="eliminarAtividade.php?codigoAtividade=<?php echo $atividade->codigo_atividade; ?>&codigo=<?php echo $codigo ?>"><button class="btn" id="btn-turmas-excluir" onclick="mostrarModal()"><i class="fa-solid fa-trash" id="teste"></i></button></a></td>

                  </tr>
        
                  <?php } ?>
            </tbody>
        </table>

    </div>

    <a href="javascript:history.back()"><button class="btn-voltar"><i class="fa-solid fa-backward"></i></button></a>

</body>
</html>