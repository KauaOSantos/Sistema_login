<?php
require_once('../../controllers/controllerLogin.php');



$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
switch ($acao) {
    case 'login':
        if (isset($_POST['email'], $_POST['senha'])) {
            try {
                $controllerLogin = new controllerLogin();
                $controllerLogin->login($_POST['email'], $_POST['senha']);
            } catch (Exception $e) {
                echo "Erro ao logar: " . $e->getMessage();
            }
        }
        else {
            echo "Por favor, preencha todos os campos obrigatórios.";
        }
        break;
    case 'logout':
        if (isset($_POST['button']) && $_POST['button'] === 'logout') {
            $controllerLogin = new controllerLogin();
            $controllerLogin->logout();
        }
        break;
    default:
        
}