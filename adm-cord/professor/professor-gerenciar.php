<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Professor.php";

$professor = new Professor();

$lista = $professor->listar();

if (empty($lista)) {
?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<div class="nenhum">
    <h2>Nenhum Professor cadastrado</h2>
</div>
<?php } else { ?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<script src="https://kit.fontawesome.com/9869816a76.js" crossorigin="anonymous"></script>
<div class="titulo">
    <h2>Professores</h2>
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
                E-mail
            </div>
            <div class="celula">
                CPF
            </div>
            <div class="celula">
                Telefone
            </div>
            <div class="celula">
                Ações
            </div>
        </div>
        <?php foreach ($lista as $linha): ?>
            <div class="linha">
                <div class="celula" data-title="Código">
                    <?php echo $linha['prof_id'] ?>
                </div>
                <div class="celula" data-title="Nome">
                    <?php echo "{$linha['nome']} {$linha['sobrenome']}" ?>
                </div>
                <div class="celula" data-title="E-mail">
                    <?php echo $linha['email'] ?>
                </div>
                <div class="celula" data-title="CPF">
                    <?php echo $linha['cpf'] ?>
                </div>
                <div class="celula" data-title="Telefone">
                    <?php echo $linha['tel'] ?>
                </div>
                <div class="celula botoes" data-title="Ações">
                    <div class="centralizar">
                        <a class="btn editar" href="adm.php?dir=professor&file=professor-editar&id=<?= $linha['prof_id'] ?>"><span><i
                                    class="fa-regular fa-pen-to-square"></i></span></a>
                        <a class="btn excluir" href="./professor/professor-excluir.php?id=<?= $linha['prof_id'] ?>"><span><i
                                    class="fa-solid fa-xmark"></i></span></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php } ?>