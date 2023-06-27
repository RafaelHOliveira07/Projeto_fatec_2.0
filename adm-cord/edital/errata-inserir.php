<?php

require_once 'login/usuario-verifica-adm.php';

?>
<link rel="stylesheet" href="./assets/css/forms.css">
<div class="central">
    <form enctype="multipart/form-data" action="edital/errata-gravar.php" method="post">
        <h2>Adicionar Errata</h2>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="status" value="<?= $_GET['status'] ?>">
        <div class="inputs">
            <label for="pdf">Selecione o (PDF)</label>
            <label for="pdf" class="file">Selecione o PDF</label>
            <input type="file" name="pdf" id="pdf">
        </div>
        <button>Confirmar</button>
    </form>
</div>
