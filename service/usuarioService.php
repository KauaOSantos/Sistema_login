<?php
require_once('../../controllers/controllerUsuario.php');

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

function handleCadastro() {
    if (!empty($_POST['nome']) &&
        !empty($_POST['data_nascimento']) &&
        !empty($_POST['email']) &&
        !empty($_POST['senha']) &&
        !empty($_POST['endereco'])) {
        try {
            $controllerUsuario = new ControllerUsuario();
            $controllerUsuario->cadastrar(
                htmlspecialchars($_POST['nome']),
                htmlspecialchars($_POST['data_nascimento']),
                filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
                $_POST['senha'],
                htmlspecialchars($_POST['endereco'])
            );
            echo "Cadastro realizado com sucesso!";
        } catch (Exception $e) {
            exibirErro("Erro ao cadastrar: " . $e->getMessage());
        }
    } else {
        exibirErro("Preencha todos os campos obrigatórios.");
    }
}

switch ($acao) {
    case 'cadastrar':
        handleCadastro();
        break;
    default:
        exibirErro("Ação inválida.");
}

function exibirErro($mensagem) {
    echo "<p class='erro'>$mensagem</p>";
}
