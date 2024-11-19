<?php

require "../..config/bd.php";
require "../..models/Usuario.php";

class ControllerUsuario{
    public $usuario;
    public $conexao;

    public function conectarBd() {
        $this->conexao = (new bd())->conectar ();
        return $this->conexao();
    }

    public function cadastrar($nome, $data_nascimento, $email, $senha, $endereco) {
        $usuario = new Usuario($this->conectarBd());
        $query = $usuario->cadastrar();

        $stmt = $this->conexao->prepare($query);
        $senhahash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->bird_param("sssss", $nome, $data_nascimento, $email, $senhahash, $endereco);
        $stmt->execute();

        $this->conexao->close();
    }
}