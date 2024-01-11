<?php

require 'Conexao.php';
require 'Models/UsuarioModel.php';
require 'Models/TurmaModel.php';
require 'Models/AtividadeModel.php';

class Usuario{

    private $erro;
    private $conexao;

    public function __construct()
    {
        $con = new Conexao();
        $this->conexao = $con->getConexao();
    }

    public function mapear($q)
    {

        $listaDeUsuarios = [];

        foreach ($q as $dados) {

            $usuario = new UsuarioModel();

            $usuario->id = $dados['id'];
            $usuario->usuario = $dados['usuario'];
            $usuario->senha = $dados['senha_hashed'];

            $listaDeUsuarios[] = $usuario;

        }

        return $listaDeUsuarios;

    }
    
    public function verificarCadastro($usuario){

        $sql = "select * from cadastros where usuario = :usuario";
        
        $q = $this->conexao->prepare($sql);
        $q->bindParam(":usuario", $usuario->usuario);
        $q->execute();

    
        $row = $q->fetch(PDO::FETCH_ASSOC);

        if($row !== false){

            $this->erro = "  Usuário já Cadastrado!";
            return true; //Usuario encontrado no sistema

        }else{

            $this->cadastrar($usuario);
            return false; //Usuario nao encontrado e prossegue o cadastro

        }

    }



    public function cadastrar($usuario){

        $sql = 
        "insert into cadastros(usuario, senha_hashed) 
        values(LOWER(:usuario), :senha);";

        $q = $this->conexao->prepare($sql);

        $q -> bindParam(":usuario", $usuario->usuario);
        $q -> bindParam(":senha", $usuario->senha);

        $q -> execute();

    }

    public function getErro(){

        return $this->erro;

    }

    public function login($usuario){

        $sql = "select * from cadastros where usuario = :usuario";
        
        $q = $this->conexao->prepare($sql);
        $q->bindParam(":usuario", $usuario->usuario);
        $q->execute();
    
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            // Verificando se a senha fornecida é válida
            if (password_verify($usuario->senha, $row['senha_hashed'])) {
                return true; // Senha está correta
            } else {
                $this->erro = "  Senha incorreta!";
                return false; // Senha incorreta
            }
        } else {
            $this->erro = "  Usuario não encontrado!";
            return false; // Usuário não encontrado
        }
    }

    //Novas funções

    public function selecionarProfessor($usuario){

        $sql = "select * from cadastros where usuario = :usuario limit 90000";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(":usuario", $usuario);
        $q->execute();
        return $this->mapear($q);

    }

    public function mapearTurma($q)
    {

        $listaDeTurmas = [];

        foreach ($q as $dados) {

            $turma = new TurmaModel();

            $turma->codigo_turma = $dados['codigo_turma'];
            $turma->codigo_professor = $dados['codigo_professor'];
            $turma->nome_turma = $dados['nome_turma'];

            $listaDeTurmas[] = $turma;

        }

        return $listaDeTurmas;

    }

    public function listarTurma($usuario)
    {
        $professores = $this->selecionarProfessor($usuario);

        $p = new UsuarioModel();

        foreach($professores as $professor){

            $p->id = $professor->id;

        }

        $sql = "select * from turmas where codigo_professor = :codigo limit 90000";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(":codigo", $p->id);
        $q->execute();
        return $this->mapearTurma($q);
    }

    public function listarTurmaPorCodigo($codigo_turma)
    {

        $sql = "select * from turmas where codigo_turma = :codigo limit 90000";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(":codigo", $codigo_turma);
        $q->execute();
        return $this->mapearAtividade($q);
    }

    public function mapearAtividade($q)
    {

        $listaDeAtividades = [];

        foreach ($q as $dados) {

            $atividade = new AtividadeModel();

            $atividade->codigo_atividade = $dados['codigo_atividade'];
            $atividade->nome_atividade = $dados['nome_atividade'];
            $atividade->codigo_turma = $dados['codigo_turma'];

            $listaDeAtividades[] = $atividade;

        }

        return $listaDeAtividades;

    }

    public function listarAtividades($codigo_turma)
    {

        $sql = "select * from atividades where codigo_turma = :codigo limit 90000";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(":codigo", $codigo_turma);
        $q->execute();
        return $this->mapearAtividade($q);
    }

    public function getTurma($codigo) {

        $turma = new TurmaModel();
    
        $arrayTurma = $this->listarTurmaPorCodigo($codigo);
    
        if (count($arrayTurma) > 0) {
    
            $turma = $arrayTurma[0];
            
        }
    
        return $turma;
    
    }

    public function eliminarAtividade($codigoAtividade){

        $sql = "delete from atividades where codigo_atividade = :codigo limit 10000";

        $q = $this->conexao->prepare($sql);
        $q->bindParam(":codigo", $codigoAtividade);
        $q->execute();

    }

    public function eliminarTurma($codigoTurma){

        $sql = "delete from turmas where codigo_turma = :codigo limit 10000";

        $q = $this->conexao->prepare($sql);
        $q->bindParam(":codigo", $codigoTurma);
        $q->execute();

    }

    public function cadastrarTurma($nomeTurma, $usuario){

        $professores = $this->selecionarProfessor($usuario);

        $p = new UsuarioModel();

        foreach($professores as $professor){

            $p->id = $professor->id;

        }

        $sql = 
        "insert into turmas(codigo_professor, nome_turma) 
        values(:codigo_professor, :nome_turma);";

        $q = $this->conexao->prepare($sql);

        $q -> bindParam(":codigo_professor", $p->id);
        $q -> bindParam(":nome_turma", $nomeTurma);

        $q -> execute();

    }

    public function cadastrarAtividade($nomeAtividade, $codigoTurma){

        $sql = 
        "insert into atividades(nome_atividade, codigo_turma) 
        values(:nome_atividade, :codigo_turma);";

        $q = $this->conexao->prepare($sql);

        $q -> bindParam(":nome_atividade", $nomeAtividade);
        $q -> bindParam(":codigo_turma", $codigoTurma);

        $q -> execute();

    }

}



?>