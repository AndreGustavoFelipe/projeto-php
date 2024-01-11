<?php

require 'classes/Usuario.php';

if(!isset($_SESSION)){

    session_start();

}

$u = new Usuario();
$usuario = new UsuarioModel();
$cadastroExiste;

if(isset($_POST['usuario']) && isset($_POST['senha'])){

    $usuario->usuario = trim($_POST['usuario']);
    $usuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if($usuario->usuario == "" || $usuario->senha == ""){
        header(('Location: cadastrar.php'));
        exit;
    }

    else{

        $cadastroExiste = $u->verificarCadastro($usuario);

        if($cadastroExiste){

            $_SESSION['cadastro_error'] = $u->getErro();
            header('Location: cadastro.php');
            
        }
        
        else{

            header('Location: index.php');

        }

    }
    
}
else{
    die("Dados do formulário não informados corretamente.");
}

?>