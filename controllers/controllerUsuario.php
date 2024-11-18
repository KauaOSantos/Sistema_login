<?php

require "../config/database.php";
require "../models/Usuario.php";

class ControllerUsuario{
    protected $tabela = 'usuario';

    public function cadastrar($nome, $data_nascimento, $email, $senha, $endereco) {
        $database = new Banco();
        $bd = $database->conectar();

        $usuario = new Usuario($bd);
        $usuario->nome = $nome;
        $usuario->data_nascimento = $data_nascimento;
        $usuario->email = $email;
        $usuario->senha = $senha;
        $usuario->endereco = $endereco;

        if($usuario->cadastrar()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Erro ao cadastrar usuario";    
        }
    }
}