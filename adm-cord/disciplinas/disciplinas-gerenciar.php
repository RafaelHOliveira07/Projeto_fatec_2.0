<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Disciplina.php";

$disciplina = new Disciplina();

$lista = $disciplina->listar();

if (empty($lista)) {
?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="nenhum">
    <h2>Nenhuma disciplina cadastrada</h2>
</div>
<?php } else { ?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="titulo">
    <h2>Disciplinas</h2>
</div>
<div class="box-tabela">
    <div class="tabela">
        <div class="linha cabecalho-tabela">
            <div class="celula">
                Código
            </div>
            <div class="celula">
                Curso
            </div>
            <div class="celula">
                Nome
            </div>
            <div class="celula">
                Área
            </div>
            <div class="celula">
                Data/Horário
            </div>
            <div class="celula">
                Ações
            </div>
        </div>
        <?php foreach ($lista as $linha): ?>
            <div class="linha">
                <div class="celula" data-title="Código">
                    <?php echo $linha['disci_id'] ?>
                </div>
                <div class="celula" data-title="Curso">
                    <?php echo $linha['sigla_curso'] ?>
                </div>
                <div class="celula" data-title="Nome">
                    <?php echo $linha['nome_disci'] ?>
                </div>
                <div class="celula" data-title="Área">
                    <?php echo $linha['area_disci'] ?>
                </div>
                <div class="celula" data-title="Data/Horário">
                    <?php echo $linha['data_hora'] ?>
                </div>
                <div class="celula botoes" data-title="Ações">
                    <div class="centralizar">
                        <a class="btn editar" href="adm.php?dir=disciplinas&file=disciplinas-editar&id=<?= $linha['disci_id'] ?>"><span><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a class="btn excluir" href="./disciplinas/disciplinas-excluir.php?id=<?= $linha['disci_id'] ?>"><span><i class="fa-solid fa-xmark"></i></span></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php } ?>