<?php

$mensagem = "";

$action = 'cadastrar.php';

if (isset($_SESSION['cadastro_error'])) {
    $mensagem = $_SESSION['cadastro_error'];
    unset($_SESSION['cadastro_error']); // remove a mensagem após exibi-la
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Tela - Cadastro</title>
</head>
<body>

    <nav class = "nav-bar" >
        <h1><a a class = "link" href="cadastro.php">Cadastro</a></h1>
    </nav>

    <div class = "alert">
        <p class = "conteudo-alert"><i class="fa-solid fa-triangle-exclamation"></i><?php echo $mensagem ?></p>
    </div>

    <div class="box-login">
            
        <h2 class = "title" >Cadastro</h2>

        <form class = "form" id = "form-cadastro" action="<?php echo $action ?>" method = "post">

            <div class = "box">
                <label for="usuario">Usuario</label>
                <input class = "input" id = "usuario-cadastro" type="text" name = "usuario" maxlength = "47" placeholder="Ex: cadastro_usuario1">
            </div>
            <div class = "box">
                <label for="senha">Senha</label>
                <input class = "input" id = "senha-cadastro" type="password" name = "senha" maxlength = "47" placeholder="Digite sua senha">
            </div>

            <button class = "btn" id = "btn-cadastro" onclick="verificaInput()" type = "button">Cadastrar</button>

        </form>

        <p>Já tem um login? <a class = "link" id = "link-box-login" href="index.php">Entre aqui!</a></p>
    
    </div>

</body>
</html>