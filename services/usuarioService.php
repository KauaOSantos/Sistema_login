<?php
require "../../controllers/controllerUsuario.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
switch ($acao) {
    case 'cadastrar':
        if (!empty($_POST['nome']) && 
            !empty($_POST['data_nascimento']) && 
            !empty($_POST['email']) && 
            !empty($_POST['senha']) && 
            !empty($_POST['endereco'])) {
            try {
                $controllerUsuario = new controllerUsuario();
                $controllerUsuario->cadastrar($_POST['nome'], $_POST['data_nascimento'], $_POST['email'], $_POST['senha'], $_POST['endereco']);
                echo "Cadastro realizado com sucesso!";
            } catch (Exception $e) {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
        else {
            echo "Preencha todos os campos obrigatórios.";
        }
        break;
    default:
        break;
}