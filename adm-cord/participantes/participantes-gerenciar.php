<?php

require_once './login/usuario-verifica-adm.php';

require_once "./../classes/Participante.php";

$id = $_GET['id'];

$participante = new Participante();

$lista = $participante->listar($id);

if (empty($lista)) {
?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="nenhum">
    <h2>Nenhum participante inscrito</h2>
</div>
<?php } else { ?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<a class="voltar" href="./adm.php?dir=participantes&file=editais-publicados">Voltar</a>
<div class="titulo">
    <h2>Participantes</h2>
</div>
<div class="box-tabela">
    <div class="tabela">
        <div class="linha cabecalho-tabela">
            <div class="celula">
                Código
            </div>
            <div class="celula">
                Nome
            </div>
            <div class="celula">
                CPF
            </div>
            <div class="celula">
                Telefone
            </div>
            <div class="celula">
                Documentos
            </div>
            <div class="celula">
                Ações
            </div>
        </div>
        <?php foreach ($lista as $linha): ?>
            <div class="linha">
                <div class="celula" data-title="Código">
                    <?php echo $linha['part_id'] ?>
                </div>
                <div class="celula" data-title="Nome">
                    <?php echo $linha['nome'], $linha['sobrenome'] ?>
                </div>
                <div class="celula" data-title="CPF">
                    <?php echo $linha['cpf'] ?>
                </div>
                <div class="celula" data-title="Telefone">
                    <?php echo $linha['tel'] ?>
                </div>
                <div class="celula" data-title="Documentos">
                <div class="centralizar">
                        <a class="btn excluir" href="./uploads/pdf_edital/" target="_blank"><i class="fa-solid fa-file-lines"></i></a> 
                    </div>
                </div>
                <div class="celula botoes" data-title="Ações">
                    <div class="centralizar">
                        <a class="btn excluir" href="participantes/participantes-excluir.php?edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>"><span><i class="fa-solid fa-xmark"></i></span></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php } ?>