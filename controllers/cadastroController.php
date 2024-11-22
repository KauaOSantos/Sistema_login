<?php

require_once '../config/banco.php';
require_once '../models/usuario.php';

class usuarioController {
    protected $banco;
    protected $usuario;

    public function __construct() {
        $this->banco = new Banco();
        $this->usuario = new Usuario($this->banco->conectar());
    }

    public function cadastrar($nome, $email, $senha, $data_nasc) {
        $this->usuario->nome = $nome;
        $this->usuario->email = $email;
        $this->usuario->senha = $senha; 
        $this->usuario->data_nascimento = $data_nasc;

        if ($this->usuario->cadastrar()) {
            echo "Cadastro realizado com sucesso!";
        } 
        else {
            echo "Erro ao cadastrar.";
        }
    }

    public function login($email, $senha) {
        $this->usuario->email = $email;
        $this->usuario->senha = $senha; 
        if ($this->usuario->logar()) {
            echo "Login bem-sucedido!";
        } 
        else {
            echo "Email ou senha incorretos.";
        }
    }
}