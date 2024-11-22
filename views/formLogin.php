<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <section>
        <h2>Login</h2>
        <form action="../service/loginUsuario.php?acao=login" method="post">
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <br><br>
    
            <label for="senha">senha</label>
            <input type="password" name="senha" id="senha">
            <br><br>
    
            <input type="submit" value="Fazer login">
    
            <p>Não possui cadastro?</p>
            <ul> 
                <li><a href="/SISTEMA_LOGIN/service/cadastroUsuario.php">Clique Aqui!</a></li>
            </ul>
        </form>
    </section>
</body>