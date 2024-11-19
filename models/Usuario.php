<?php
class Usuario{
    private $tabela = "usuario";

    public $id_usuario;
    public $nome;
    public $data_nascimento;
    public $email;
    public $senha;
    public $endereco;

    public function construct(){

    }
    
    public function cadastrar(){
        return "INSERT INTO {$this->tabela} (nome, data_nascimento, email, senha, endereco ) values (?,?,?,?,?);";
    }

    public function selecionar(){
        return = "SELECT * FROM {$this->tabela} WHERE id_usuario = ?";
    }
}