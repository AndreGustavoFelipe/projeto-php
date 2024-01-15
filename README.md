# projeto-php

## O que é?

Esse é um sistema web, que permite cadastrar turmas e suas respectivas atividades, vinculadas a usuários / professores

## Como rodar?

Na pasta "CONFIGURACOES" estará o link do programa utilizado para abrir um servidor local, chamado XAMPP. Após baixar basta iniciar o "Apache" e "MySql". 
No banco de dados a porta será a 3306, ja no apache 80, 443.
Rode o DUMP do banco de dados na sua máquina, pra construir o proejto utilizei o MySQL Workbench.
Logo após, abra a pasta no programa que você utiliza para codar, nesse projeto utilizei o Visual Studio Code.
Na pasta "CONFIGURACOES" estará o link para rodar o seridor interno do próprio PHP, copie ele, e no terminal do seu editor de texto cole ele.
Agora abra ele com o link que apareceu no terminal, ou por esse: http://localhost:8080

## Quais suas funções?

- Realizar login;

- Realizar um novo cadastro;

- Inserir novas turmas;

- Deletar turmas;

- Ver quais atividades estão relacionadas a turma;

- Inserir novas atividades;

- Deletar atividades;

- LogOut do sistema ;

## Qual as principais validações?

- Na tela de login e cadastro, caso o usuário não informe nada e tente logar/cadastrar, será exibido um alert com um erro.

- Na tela de cadastro, caso o usuário tente criar dois cadastros com o mesmo nome de usuário, o sistema não permitirá.

- Caso algum usuário, não logado no sistema, tente acessar alguma página com a URL direcionando ele, o sistema não vai deixar, e exibirá uma mensagem.

## Quais tecnologias foram utilizadas?

- HTML5

- CSS3

- JavaScript

- PHP

**Editor de texto:** Visual Studio Code

**Banco de dados:** SQL

**Servidor:** XAMPP
