<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Curso.php";

$curso = new Curso();

$lista = $curso->listar();

if (empty($lista)) {
?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="nenhum">
    <h2>Nenhum curso cadastrado</h2>
</div>
<?php } else { ?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="titulo">
    <h2>Cursos</h2>
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
                Sigla
            </div>
            <div class="celula">
                Descrição
            </div>
            <div class="celula">
                Ações
            </div>
        </div>
        <?php foreach ($lista as $linha): ?>
            <div class="linha">
                <div class="celula" data-title="Código">
                    <?php echo $linha['curso_id'] ?>
                </div>
                <div class="celula" data-title="Curso">
                    <?php echo $linha['nome_curso'] ?>
                </div>
                <div class="celula" data-title="Sigla">
                    <?php echo $linha['sigla_curso'] ?>
                </div>
                <div class="celula" data-title="Descrição">
                    <?php echo $linha['desc_curso'] ?>
                </div>
                <div class="celula botoes" data-title="Ações">
                    <div class="centralizar">
                        <a class="btn editar" href="adm.php?dir=cursos&file=cursos-editar&id=<?= $linha['curso_id'] ?>"><span><i class="fa-regular fa-pen-to-square"></i></span></a>
                        <a class="btn excluir" href="./cursos/cursos-excluir.php?id=<?= $linha['curso_id'] ?>"><span><i class="fa-solid fa-xmark"></i></span></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php } ?>