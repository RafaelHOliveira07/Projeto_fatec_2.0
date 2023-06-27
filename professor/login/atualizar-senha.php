<?php

(isset($_POST['redirecionar'])) ? $redirecionar = $_POST['redirecionar'] : $redirecionar = 1;


if ($redirecionar == 1) {
    $id = $_GET['id'] ?? 0;
} else {

    $id = $_POST['prof_id'];
    $chave = $_POST['chave'];

    require_once "../classes/Professor.php";

    $professor = new Professor();

    $lista = $professor->listarRecuperar($id);

    if (!($chave === $lista['recuperar_senha'])) {
        header("Location: ../index.php?dir=login&file=recuperar-atualizar&chave={$chave}&id={$id}&token=não");
    }
}
?>
<link rel="stylesheet" href="./assets/css/login.css">
<section class="conteudo recuperar">
    <div class="login">
        <form action="login/gravar-senha.php" method="post" class="box-login">
            <input type="hidden" name="prof_id" value="<?= $id ?>">
            <input type="hidden" name="redirecionar" value="<?= $redirecionar ?>">
            <div class="titulo-login recuperar">
                <h2>Nova Senha</h2>
            </div>
            <div class="inputs recuperar">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite a senha" required onchange="confereSenha();" onkeyup="senhaFiltro();">
            </div>
            <div class="inputs recuperar">
                <label for="">Confirmar senha</label>
                <input type="password" name="confirmaSenha" placeholder="Confirme a senha" required onchange="confereSenha();">
            </div>
            <ul id="requisitos">
                <li id="tamanho" style="color: #888;"> Minímo 8 caracteres</li>
                <li id="maiuscula" style="color: #888;">Letra maiúscula</li>
                <li id="minuscula" style="color: #888;">Letra minúscula</li>
                <li id="numero" style="color: #888;">Número</li>
                <li id="especial" style="color: #888;">Caractere esepecial (.!@#$%¨&*()_+=,)</li>
            </ul>
            <button>Confirmar</button>
        </form>
    </div>
</section>