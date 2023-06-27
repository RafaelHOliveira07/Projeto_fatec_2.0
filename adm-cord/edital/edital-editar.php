<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Curso.php";
require_once "../classes/Edital.php";

$id = $_GET['id'];

$edital = new Edital($id);

$curso = new Curso();

$lista = $curso->listar();

$lista2 = $lista;

require_once "../classes/Disciplina.php";

$disciplina = new Disciplina();

$lista = $disciplina->listar();

?>


<link rel="stylesheet" href="./assets/css/forms.css">
<div class="central">
    <form enctype="multipart/form-data" action="edital/edital-editar-gravar.php" method="post">
        <h2>Adicionar Edital</h2>
        <input type="hidden" name="edital_id" value="<?= $edital->edital_id ?>">
        <input type="hidden" name="pdf-gravado" value="<?= $edital->pdf ?>">
        <div class="inputs">
            <label for="curso_id">Selecione a sigla do Curso relacionado ao edital</label>
            <select name="curso_id" id="curso_id">
                <option value="<?= $edital->curso_id ?>"><?= $edital->sigla_curso ?></option>
                <?php
                foreach ($lista2 as $linha):
                    echo "<option value='{$linha['curso_id']}'>
                                         {$linha['sigla_curso']}
                          </option>";
                endforeach
                ?>
            </select>
        </div>
        <div class="inputs">
            <label for="disci_id">Selecione a Disciplina correspondente ao edital</label>
            <select name="disci_id" id="disci_id">
                <option value="<?= $edital->disci_id ?>"><?= $edital->nome_disci ?></option>
            </select>
        </div>
        <div class="inputs">
            <label for="num_edital">Número do edital</label>
            <input type="text" name="num_edital" id="num_edital" value="<?= $edital->num_edital ?>">
        </div>
        <div class="inputs">
            <label for="pdf">Selecione o (PDF)</label>
            <label for="pdf" class="file">Selecione o PDF</label>
            <input type="file" name="pdf" id="pdf">
        </div>
        <button>Confirmar</button>
    </form>
</div>
