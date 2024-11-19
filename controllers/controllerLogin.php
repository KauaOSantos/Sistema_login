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

    // Valida o login e redireciona para a index
    public function login($email, $senha) {
        // Busca o usuário no banco de dados
        $consulta = "SELECT * FROM usuario WHERE email = ? LIMIT 1";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 0) {
            // Usuário não encontrado, redireciona para a página de cadastro
            $_SESSION['erro_login'] = "Usuário não encontrado. Faça seu cadastro.";
            header("Location: ../views/cadastro_usuario.php");
            $stmt->close();
            exit();
        }

        // Obtém os dados do usuário
        $usuario = $resultado->fetch_assoc();
        $stmt->close();

        // Verifica a senha
        if (password_verify($senha, $usuario['senha'])) {
            // Inicia a sessão e redireciona para a home
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            header("Location: ../views/index.php");
            exit();
        } else {
            // Senha incorreta, redireciona para a página de login
            $_SESSION['erro_login'] = "Senha ou email incorretos!";
            header("Location: ../views/index.php");
            exit();
        }
    }

    // Função para deslogar
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ../views/index.php");
        exit();
    }
}