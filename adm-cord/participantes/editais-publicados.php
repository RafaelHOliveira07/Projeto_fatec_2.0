<?php

require_once './login/usuario-verifica-adm.php';

require_once "../classes/Edital.php";

$edital = new Edital();

$lista = $edital->listarPublicados();

if (empty($lista)) {
?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="nenhum">
    <h2>Nenhum edital publicado</h2>
</div>
<?php } else { ?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="titulo">
    <h2>Editais</h2>
</div>
<div class="box-tabela">
    <div class="tabela">
        <div class="linha cabecalho-tabela">
            <div class="celula">
                Código
            </div>
            <div class="celula">
                Número do Edital
            </div>
            <div class="celula">
                Curso
            </div>
            <div class="celula">
                Disciplina
            </div>
            <div class="celula">
                Área
            </div>
            <div class="celula">
                Data/Horário
            </div>
            <div class="celula">
                PDF
            </div>
            <div class="celula">
                Listar
            </div>
        </div>
        <?php foreach ($lista as $linha): ?>
            <div class="linha">
                <div class="celula" data-title="Código">
                    <?php echo $linha['edital_id'] ?>
                </div>
                <div class="celula" data-title="Número do Edital">
                    <?php echo $linha['num_edital'] ?>
                </div>
                <div class="celula" data-title="Curso">
                    <?php echo $linha['sigla_curso'] ?>
                </div>
                <div class="celula" data-title="Disciplina">
                    <?php echo $linha['nome_disci'] ?>
                </div>
                <div class="celula" data-title="Área">
                    <?php echo $linha['area_disci'] ?>
                </div>
                <div class="celula" data-title="Data/Horário">
                    <?php echo $linha['data_hora'] ?>
                </div>
                <div class="celula" data-title="PDF">
                    <div class="centralizar">
                        <a class="btn excluir" href="../uploads/pdf/<?php echo $linha['pdf']?>" target="_blank"><i class="fa-solid fa-file-lines"></i></a> 
                    </div>
                </div>
                <div class="celula botoes" data-title="Listar">
                    <div class="centralizar">
                        <a class="btn editar" href="adm.php?dir=participantes&file=participantes-gerenciar&id=<?= $linha['edital_id'] ?>"><i class="fa-solid fa-list"></i></i></span></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php } ?>