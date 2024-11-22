<?php
require_once('../controllers/controllerLogin.php');

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

function handleLogin() {
    if (isset($_POST['email'], $_POST['senha'])) {
        try {
            $controllerLogin = new ControllerLogin();
            $controllerLogin->login($_POST['email'], $_POST['senha']);
        } catch (Exception $e) {
            exibirErro("Erro ao logar: " . $e->getMessage());
        }
    } 
    else {
        exibirErro("Por favor, preencha todos os campos obrigatórios.");
    }
}

function handleLogout() {
    $controllerLogin = new ControllerLogin();
    $controllerLogin->logout();
}

switch ($acao) {
    case 'login':
        handleLogin();
        break;
    case 'logout':
        handleLogout();
        break;
    default:
        exibirErro("Ação inválida.");
}

function exibirErro($mensagem) {
    echo "<p class='erro'>$mensagem</p>";
}
