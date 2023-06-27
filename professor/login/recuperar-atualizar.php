<?php

$id = $_GET['id'];
$chave = $_GET['chave'];
$email = $_GET['email'];

?>
<link rel="stylesheet" href="./assets/css/login.css">
<section class="conteudo recuperar">
    <div class="login">
        <form action="index.php?dir=login&file=atualizar-senha" method="post" class="box-login">
            <input type="hidden" name="prof_id" value="<?= $id ?>">
            <input type="hidden" name="chave" value="<?= $chave ?>">
            <input type="hidden" name="redirecionar" value="0">
            <div class="titulo-login recuperar2">
                <h2>Chave de Recuperação</h2>
            </div>
            <div class="inputs recuperar">
                <label for="Chave">Chave</label>
                <input type="text" name="Chave" id="Chave" placeholder="Insira a chave" required>
                <?php if (!empty($_GET['token']) and $_GET['token'] === 'não') { ?>
                    <small>Chave Inválida</small>
                <?php } ?>
            </div>
            <div class="botoes">
                <a href="login/recuperar-enviar.php?email=<?= $email ?>" class="reenviar">Reenviar</a>
                <button>Confirmar</button>
            </div>
        </form>
    </div>
</section>