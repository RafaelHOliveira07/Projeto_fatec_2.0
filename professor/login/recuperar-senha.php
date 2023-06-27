<link rel="stylesheet" href="./assets/css/login.css">
<section class="conteudo recuperar">
    <div class="login">
        <form action="login/recuperar-enviar.php" method="post" class="box-login">
            <input type="hidden" name="local" value="<?= $local ?>">
            <input type="hidden" name="edital_id" value="<?= $edital_id ?>">
            <div class="titulo-login recuperar">
                <h2>Recuperar Senha</h2>
            </div>
            <div class="inputs recuperar">
                <label for="email">E-mail para recuperação</label>
                <input type="text" name="email" id="email" placeholder="Digite o email cadastrado" required>
                <?php if (!empty($_GET['email']) and $_GET['email'] === 'não') { ?>
                    <small>E-mail Inválido</small>
                <?php } elseif (!empty($_GET['email']) and $_GET['email'] === 'erro') { ?>
                    <small>ERRO ao enviar o e-mail</small>
                <?php } ?>
            </div>
            <button>Enviar</button>
        </form>
    </div>
</section>