<?php

require_once 'login/usuario-verifica-adm.php';

?>
<link rel="stylesheet" href="./assets/css/forms.css">
<div class="central">
    <form action="./professor/professor-gravar.php" method="post">
        <h2>Cadastrar Professor</h2>
        <div class="linha-form">
            <div class="inputs">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome">
            </div>
            <div class="inputs">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite o sobrenome">
            </div>
        </div>
        <div class="linha-form">
            <div class="inputs">
                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" name="data_nasc" id="data_nasc">
            </div>
            <div class="inputs">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" placeholder="Digite o e-mail">
            </div>
        </div>
        <div class="linha-form">
            <div class="inputs">
                <label for="tel">Telefone</label>
                <input type="tel" name="tel" id="tel" placeholder="Digite o telefone" maxlength="15" onkeyup="telefone(event)">
            </div>
            <div class="inputs">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o cpf" maxlength="14" onkeyup="cpfreplace(event)">
            </div>
        </div>
        <div class="linha-form">
            <div class="inputs">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" placeholder="Digite o CEP" maxlength="9" onkeyup="cepreplace(event)" onblur="pesquisacep(this.value);">
            </div>
            <div class="inputs">
                <label for="endereco">Endereco</label>
                <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço">
            </div>
        </div>
        <div class="linha-form">
            <div class="inputs">
                <label for="n_casa">Número</label>
                <input type="text" name="n_casa" id="n_casa" placeholder="Digite o número">
            </div>
            <div class="inputs">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro">
            </div>
        </div>
        <div class="linha-form">
            <div class="inputs">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" placeholder="Digite a cidade">
            </div>
            <div class="inputs">
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" placeholder="Digite o estado">
            </div>
        </div>
        <button>Confirmar</button>
    </form>
</div>
<?php

if (isset($_GET['erro']) AND $_GET['erro'] == 1) echo "<script>alert('Erro ao cadastrar o professor, tente novamente');</script>";

?>