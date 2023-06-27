<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="shortcut icon" href="./img/administracao.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <header class="cabecalho">
        <div class="titulo">
            <img src="img/administracao.png" id="adm" alt="">
            <h2>Fatec Itapira</h2>
        </div>
    </header>
    <section class="home">
        <form action="login/usuario-login.php" method="post" class="box-login">
            <div class="titulo-login">
                <h2>Login</h2>
            </div>
            <div class="inputs">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" id="usuario" placeholder="Digite o Usuário" required>
            </div>
            <div class="inputs">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
            </div>
            <button>Entrar</button>
        </form>  
    </section>

</body>
</html>