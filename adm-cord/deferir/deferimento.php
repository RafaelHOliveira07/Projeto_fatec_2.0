<?php

require_once './login/usuario-verifica-cord.php';

require_once "./../classes/Participante.php";

$id = $_GET['id'];

$participante = new Participante();

$lista = $participante->listar($id);
if (empty($lista)) {
?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<a class="voltar" href="./cord.php?dir=deferir&file=editais-publicados-cord">Voltar</a>
<div class="nenhum">
    <h2>Nenhuma inscrição</h2>
</div>
<?php } else { ?>
<link rel="stylesheet" href="./assets/css/tabela.css">
<a class="voltar" href="./cord.php?dir=deferir&file=editais-publicados-cord">Voltar</a>
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
                Status
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
                <div class="celula" data-title="Status">
                    <?php $status = $participante->identStatus($linha['deferimento']);
                    echo $status; ?>
                </div>
                <div class="celula" data-title="Documentos">
                    <div class="centralizar">
                        <a class="btn excluir" href="../uploads/doc/<?= $linha['doc'] ?>"
                            download="Documentos<?= " {$linha['nome']} {$linha['sobrenome']}" ?>"><i
                                class="fa-solid fa-file-arrow-down"></i></i></a>
                    </div>
                </div>
                <div class="celula botoes" data-title="Ações">
                    <?php if ($linha['deferimento'] == 4){ ?>
                    <div class="centralizar">
                        <div class="dropdown">
                            <button class="dropbtn editar"><i class="fa-solid fa-caret-down"></i></button>
                            <div class="dropdown-conteudo">
                                <a
                                    href="deferir/alterar-status.php?status=1&edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>">Deferir</a>
                                <a
                                    href="cord.php?dir=deferir&file=motivo&status=5&edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>">Indeferir</a>
                                <a
                                    href="deferir/alterar-status.php?status=3&edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>">Convocar</a>
                            </div>
                        </div>
                        <a class="btn excluir"
                            href="participantes/participantes-excluir.php?edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>"><span><i
                                    class="fa-solid fa-xmark"></i></span></a>
                    </div>
                    <?php } else { ?>
                    <div class="centralizar">
                        <div class="dropdown">
                            <button class="dropbtn editar"><i class="fa-solid fa-caret-down"></i></button>
                            <div class="dropdown-conteudo">
                                <a
                                    href="deferir/alterar-status.php?status=1&edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>">Deferir</a>
                                <a
                                    href="cord.php?dir=deferir&file=motivo&status=2&edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>">Indeferir</a>
                                <a
                                    href="deferir/alterar-status.php?status=3&edital_id=<?= $id ?>&id=<?= $linha['part_id'] ?>">Convocar</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php } ?>