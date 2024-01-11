<?php

include 'protect.php';
require 'classes\Usuario.php';

$usuario = $_SESSION['usuario'];

$action = 'adicionarTurma.php';

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
            <h1><a a class = "link" href="pagAddTurma.php"><?php echo $usuario; ?></a></h1>
        </div>

        <a class = "link" id = "link-finalizarSession" href="finalizarSession.php">Sair</a>

    </nav>  

    <div class="box-login" id="box-novaTurma">
        
        <form class="form" action="<?php echo $action ?>" method="post">

            <div class="div-novaTurma">

                <label>Nome da turma</label>
                <input class = "input" id="input-novaTurma" name="nome_turma" placeholder="Ex: Sistemas de Informação" type="text">

                <input type="text" hidden name="usuario" value="<?php echo $usuario ?>">

            </div>

            <button class="btn" id="btn-novaTurma" type="submit">Adicionar Turma</button>
    
        </form>

    </div>

    <a href="javascript:history.back()"><button class="btn-voltar"><i class="fa-solid fa-backward"></i></button></a>

</body>
</html>