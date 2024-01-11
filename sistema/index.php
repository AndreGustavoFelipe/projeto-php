<?php

session_start();

$mensagem = "";

$action = 'login.php';

if (isset($_SESSION['login_error'])) {
    $mensagem = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // remove a mensagem após exibi-la
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js"></script>
    <title>Tela - Login</title>
</head>
<body>

    <nav class = "nav-bar">
        <h1><a a class = "link" href="index.php">Login</a></h1>
    </nav>

    <div class = "alert">
        <p class = "conteudo-alert"><i class="fa-solid fa-triangle-exclamation"></i><?php echo $mensagem ?></p>
    </div>

    <div class="box-login">
            
        <h2 class = "title" >Login</h2>

        <form class = "form" action="<?php echo $action; ?>" method="post">

            <div class = "box">
                <label for="usuario">Usuário</label>
                <input class = "input" id = "usuario" type="text" name = "usuario" placeholder="Ex: usuario_cadastrado">
            </div>
            
            <div class = "box">
                <label for="senha">Senha</label>
                <input class = "input" id = "senha" type="password"  name = "senha" placeholder="Digite sua senha">
            </div>

            <button class = "btn" type = "submit" >Entrar</button>

        </form>

        <p>Não possui um cadastro? <a class = "link" id = "link-box-login" href="cadastro.php">Cadastre-se aqui!</a></p>
    
    </div>

</body>
</html>