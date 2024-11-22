<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Usuario</title>
</head>
<body>
    <section>
        <h2>Cadastrar Usuario</h2>
        <form action="../service/cadastroUsuario.php?acao=cadastrar" method="post">
    
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>
            <br><br>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <br><br>
            
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
            <br><br>
            
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" required>
            <br><br>
            
            <input type="submit" value="Cadastrar Usuario">
        </form>
    </section>
</body>
</html>