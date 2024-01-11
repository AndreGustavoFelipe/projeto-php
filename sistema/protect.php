<?php

if(!isset($_SESSION)){

    session_start();

}

if(!isset($_SESSION['usuario'])){

    die("Você não pode acessar essa página porque não está logado!<p class = \"link\"><a href=\"index.php\">Clique aqui para fazer login</a></p>");

}

?>
