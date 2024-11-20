<?php

require "../models/Usuario.php";
require "../config/bd.php";

class ControllerUsuario{
    public $usuario;
    public $conexao;

    public function conectarBd() {
        $this->conexao = (new bd())->conectar ();
        return $this->conexao();
    }

    public function cadastrar($nome, $data_nascimento, $email, $senha, $endereco) {
        $this->conexao = $this->conectarBd();
        $usuario = new Usuario($this->conexao);
        $query = $usuario->cadastrar();

        $stmt = $this->conexao->prepare($query);
        $senhahash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->bird_param("sssss", $nome, $data_nascimento, $email, $senhahash, $endereco);
        $stmt->execute();

        $this->conexao->close();
    }
}