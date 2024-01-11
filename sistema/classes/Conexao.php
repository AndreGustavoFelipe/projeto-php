<?php

class Conexao
{

    public function getConexao()
    {
        $host = 'localhost';
        $porta = 3306;
        $dbName = 'projeto';

        $usuario = 'root';
        $senha = '';

        $con = new PDO
        (
            "mysql:host=" . $host . ";port=" . $porta . ";dbname=" . $dbName . "",
            $usuario,
            $senha
        );

        return $con;
    }

}

?>