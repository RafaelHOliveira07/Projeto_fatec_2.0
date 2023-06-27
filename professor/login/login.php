<?php

(!empty($_GET['local'])) ? $local = $_GET['local'] : $local = 0 ;
(!empty($_GET['edital_id'])) ? $edital_id = $_GET['edital_id'] : $edital_id = 0 ;

?>
<link rel="stylesheet" href="./assets/css/login.css">
<section class="conteudo">
    <div class="texto-login">
        <ul>
            <li>
                <h2>Seja Bem-vindo</h2>
            </li>
            <li>
                <p>ao portal de editais da Fatec Itapira</p>
            </li>
        </ul>
    </div>
    <div class="login">
        <form action="login/usuario-login.php" method="post" class="box-login">
            <input type="hidden" name="local" value="<?= $local ?>">
            <input type="hidden" name="edital_id" value="<?= $edital_id ?>">
            <div class="titulo-login">
                <h2>Login</h2>
            </div>
            <div class="inputs">
                <label for="cpf">Usuário</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o Usuário" required>
            </div>
            <div class="inputs recuperar">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                <?php if (!empty($_GET['usuario']) AND $_GET['usuario'] == 'não'){ ?>
                    <small>Usuário ou senha inválidos</small>
                <?php } ?>
            </div>
            <a href="index.php?dir=login&file=recuperar-senha"><small>Esqueci a senha</small></a>
            <button>Entrar</button>
        </form>
    </div>
</section>