<?php

require_once './login/usuario-verifica-cord.php';

?>
<link rel="stylesheet" href="./assets/css/forms.css">
<div class="central">
    <form action="deferir/indeferir.php" method="post">
        <h2>Indeferir</h2>
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="edital_id" value="<?= $_GET['edital_id'];?>">
        <input type="hidden" name="status" value="<?= $_GET['status']; ?>">
        <div class="inputs">
            <label for="motivo">Inserir motivo do indeferimento</label>
            <textarea name="motivo" id="motivo" cols="30" rows="10"></textarea>
        </div>
        <button>Confirmar</button>
    </form>
</div>