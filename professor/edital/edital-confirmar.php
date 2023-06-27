<?php

require_once 'login/usuario-verifica.php';

require_once "../classes/Professor.php";

$id = $_SESSION['id_logado'];

$id_edital = $_GET['edital_id'];

$professor = new Professor($id);

?>
<link rel="stylesheet" href="./assets/css/confirmar.css">
<section class="conteudo">
    <div class="titulo">
        <h2>Confirmar Dados</h2>
    </div>
    <form enctype="multipart/form-data" action="edital/participante-gravar.php" method="post">
        <div class="dados">
            <div class="info">
                <h3>Dados Cadastrados</h3>
                <input type="hidden" name="prof_id" id="" value="<?= $professor->prof_id ?>">
                    <input type="hidden" name="edital_id" id="" value="<?= $id_edital ?>">
                    <input type="hidden" name="nome" id="" value="<?= $professor->nome ?>">
                    <input type="hidden" name="sobrenome" id="" value="<?= $professor->sobrenome ?>">
                <div class="inputs">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome2" value="<?= $professor->nome ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome2" id="sobrenome" value="<?= $professor->sobrenome ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="text" name="data_nasc" id="data_nasc" value="<?php $datetime = new DateTime($professor->data_nasc); echo $datetime->format('d/m/Y')  ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" value="<?= $professor->email ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="tel">Telefone</label>
                    <input type="tel" name="tel" id="tel" value="<?= $professor->tel ?>" maxlength="15"
                        onkeyup="telefone(event)" disabled>
                </div>
                <div class="inputs">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="<?= $professor->cpf ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" value="<?= $professor->cep ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="endereco">Endereco</label>
                    <input type="text" name="endereco" id="endereco" value="<?= $professor->endereco ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="n_casa">Número</label>
                    <input type="text" name="n_casa" id="n_casa" value="<?= $professor->n_casa ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="<?= $professor->bairro ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" value="<?= $professor->cidade ?>" disabled>
                </div>
                <div class="inputs">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" value="<?= $professor->estado ?>" disabled>
                </div>
            </div>
            <div class="docs">
                <h3>Documentos Obrigatorios</h3>
                <div class="inputs">
                    <label for="pdf">Anexo VI - Ficha de Manifestação de Interesse <a href="../uploads/doc/ANEXO-VI-Instrucao-Cesu-8-2023-2.docx" download="Ficha_de_manifestação_de_interesse"><i class="fa-solid fa-file-arrow-down"></i></a></label>
                    <label for="pdf" class="file">Selecione</label>
                    <input type="file" name="documentos[]" id="pdf">
                    
                </div>
                <div class="inputs">
                    <label for="pdf2">Anexo IV - Tabela de Pontuação <a href="../uploads/doc/ANEXO-IV-Instrucao-Cesu-08-2023-31.xlsx" download="Tabela_de_pontuação"><i class="fa-solid fa-file-arrow-down"></i></a></label>
                    <label for="pdf2" class="file2">Selecione</label>
                    <input type="file" name="documentos[]" id="pdf2">
                    
                </div>
                <div class="inputs">
                    <label for="pdf3">Documentos</label>
                    <label for="pdf3" class="file3">Selecione</label>
                    <input type="file" name="documentos[]" multiple="multiple" id="pdf3">
                </div>
            </div>
        </div>
        <button>Confirmar</button>
    </form>
</section>