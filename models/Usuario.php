<?php

require_once 'Crud.php';

class Usuario {
    private $conexao;
    private $table = "usuario";

    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $data_nascimento;

    public function __construct($bd) {
        $this->conexao = $bd;
    }

    public function getIdUsuario($id_usuario) {
        $query = "SELECT * FROM {$this->table} WHERE id_usuario = {$this->$id_usuario}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MSQLI_ASSOC);
    }

    public function cadastrar() {
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO {$this->table} (nome, email, senha, data_nascimento$data_nascimento) values ('{$this->nome}','{$this->email}','{$this->senha}','{$this->data_nascimento$data_nascimento}');";
        return $this->conexao->query($query);
    }

    public function logar() {
        $query = "SELECT * FROM {$this->table} WHERE email = ? LIMIT 1";
        $stmt = $this->conexao->prepare($query);
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($this->senha, $usuario['senha'])) {
                return true;
            }
        }
        return false;
    }

    public function __destruct() {
        if ($this->conexao) {
            $this->conexao->close();
        }
    }

    public function ler() {
        $query = "SELECT * FROM {$this->table}";
        return $this->conexao->query($query);
    }

    public function atualizar() {
        $query = "UPDATE {$this->table} SET nome = {$this->nome}, email = {$this->email}, senha = {$this->senha}, data_nascimento$data_nascimento = {$this->data_nascimento$data_nascimento} WHERE id_usuario = {$this->id_usuario}";
    }

    public function deletar() {
        $query = "DELETE FROM {$this->table} WHERE id_usuario = {$this->id_usuario}";
        return $this->conexao->prepare($query);
    }
}