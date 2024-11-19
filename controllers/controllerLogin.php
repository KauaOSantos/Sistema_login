<?php

require_once('../../config/bd.php');

class ControllerLogin {
    private $conexao;

    public function __construct() {
        $bd = new bd();
        $this->conexao = $bd->conectar();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($email, $senha) {
        $consulta = "SELECT * FROM usuario WHERE email = ? LIMIT 1";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 0) {
            $_SESSION['erro_login'] = "Usuário não encontrado. Faça seu cadastro.";
            header("Location: ../views/cadastro_usuario.php");
            $stmt->close();
            exit();
        }

        $usuario = $resultado->fetch_assoc();
        $stmt->close();

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            header("Location: ../views/index.php");
            exit();
        } 
        else {
            $_SESSION['erro_login'] = "Senha ou email incorretos!";
            header("Location: ../views/index.php");
            exit();
        }
    }
}