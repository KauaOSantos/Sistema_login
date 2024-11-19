<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biblioteca 141 - Cadastro Usuário</title>
    <style>
        .inputBox {
            margin-bottom: 15px;
        }
        .inputUser {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 5px;
        }
        .labelInput {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        #submit {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        #submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <main>
        <div class="boxCadsusuario">
            <form action="index.php" method="post"> 
                <legend><b>Cadastro de Usuário</b></legend>
                <br><br>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>

                <div class="inputBox">
                    <label for="email" class="labelInput">E-mail:</label>
                    <input type="email" name="email" id="email" class="inputUser" required>
                </div>

                <div class="inputBox">
                    <label for="endereco" class="labelInput">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                </div>

                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha:</label>
                    <input type="password" name="senha" id="password" class="inputUser" required>
                </div>

                <div class="inputBox">
                    <label for="nascimento" class="labelInput"><b>Data de Nascimento:</b></label>
                    <input type="date" name="nascimento" id="nascimento" required>
                </div>

                <input type="submit" name="acao" id="submit" value="Cadastrar">
            </form>
        </div>
    </main>
</body>
</html>