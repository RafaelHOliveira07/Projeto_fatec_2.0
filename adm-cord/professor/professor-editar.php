<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Professor.php";

$id = $_GET['id'];

$professor = new Professor($id);

?>
<link rel="stylesheet" href="./assets/css/forms.css">
<div class="central">
    <form action="./professor/professor-editar-gravar.php" method="post">
        <h2>Cadastrar Professor</h2>
        <div class="linha-form">
            <div class="inputs">
                <input type="hidden" name="prof_id" value="<?= $professor->prof_id ?>">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $professor->nome ?>">
            </div>
            <div class="inputs">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome" value="<?= $professor->sobrenome ?>"">
            </div>
        </div>
        <div class=" linha-form">
                <div class="inputs">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" name="data_nasc" id="data_nasc" value="<?= $professor->data_nasc ?>">
                </div>
                <div class="inputs">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" value="<?= $professor->email ?>">
                </div>
            </div>
            <div class="linha-form">
                <div class="inputs">
                    <label for="tel">Telefone</label>
                    <input type="tel" name="tel" id="tel" value="<?= $professor->tel ?>" maxlength="15"
                        onkeyup="telefone(event)">
                </div>
                <div class="inputs">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="<?= $professor->cpf ?>" maxlength="14"
                        onkeyup="cpfreplace(event)">
                </div>
            </div>
            <div class="linha-form">
                <div class="inputs">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" value="<?= $professor->cep ?>" maxlength="9"
                        onkeyup="cepreplace(event)" onblur="pesquisacep(this.value);">
                </div>
                <div class="inputs">
                    <label for="endereco">Endereco</label>
                    <input type="text" name="endereco" id="endereco" value="<?= $professor->endereco ?>">
                </div>
            </div>
            <div class="linha-form">
                <div class="inputs">
                    <label for="n_casa">Número</label>
                    <input type="text" name="n_casa" id="n_casa" value="<?= $professor->n_casa ?>">
                </div>
                <div class="inputs">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="<?= $professor->bairro ?>">
                </div>
            </div>
            <div class="linha-form">
                <div class="inputs">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" value="<?= $professor->cidade ?>">
                </div>
                <div class="inputs">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" value="<?= $professor->estado ?>">
                </div>
            </div>
        <button>Salvar</button>
    </form>
</div>