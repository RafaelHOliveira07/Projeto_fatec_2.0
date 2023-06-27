<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Edital.php";

$edital = new Edital();

$lista = $edital->listar();

if (empty($lista)) {
    ?>
    <link rel="stylesheet" href="./assets/css/tabela.css">
    <div class="nenhum">
        <h2>Nenhum edital cadastrado</h2>
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
                    Errata
                </div>
                <div class="celula">
                    Status
                </div>
                <div class="celula">
                    Ações
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
                            <a class="btn excluir" href="../uploads/pdf/<?php echo $linha['pdf'] ?>" target="_blank"><i
                                    class="fa-solid fa-file-lines"></i></a>
                        </div>
                    </div>
                    <?php if (!empty($linha['errata'])) { ?>
                        <div class="celula" data-title="Errata">
                            <div class="centralizar">
                                <a class="btn excluir" href="../uploads/pdf/<?php echo $linha['errata'] ?>" target="_blank"><i
                                        class="fa-solid fa-file-lines"></i></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="celula" data-title="Errata">
                            <div class="centralizar">
                                nenhuma errata
                            </div>
                        </div>
                    <?php } ?>
                    <div class="celula" data-title="Status">
                        <?php $status = $edital->identStatus($linha['status_edital']);
                        echo $status; ?>
                    </div>
                    <div class="celula botoes" data-title="Ações">
                        <div class="centralizar">
                            <div class="dropdown">
                                <button class="dropbtn editar"><i class="fa-solid fa-caret-down"></i></button>
                                <div class="dropdown-conteudo edital">
                                    <?php if ($linha['status_edital'] == 0) { ?>
                                    <a
                                        href="adm.php?dir=edital&file=edital-editar&id=<?= $linha['edital_id'] ?>">Editar</a>
                                    <?php } ?>
                                    <a
                                        href="edital/edital-alterar-status.php?status=1&id=<?= $linha['edital_id'] ?>">Publicar</a>
                                    <a
                                        href="adm.php?dir=edital&file=errata-inserir&status=2&id=<?= $linha['edital_id'] ?>">Errata</a>
                                    <a href="edital/edital-alterar-status.php?status=3&id=<?= $linha['edital_id'] ?>">Em
                                        Análise</a>
                                    <a href="edital/edital-alterar-status.php?status=4&id=<?= $linha['edital_id'] ?>">Encerrado
                                        sem inscrições</a>
                                    <a
                                        href="edital/edital-alterar-status.php?status=5&id=<?= $linha['edital_id'] ?>">Deferido</a>
                                    <a href="edital/edital-alterar-status.php?status=6&id=<?= $linha['edital_id'] ?>">Resultado
                                        Parcial</a>
                                    <a href="edital/edital-alterar-status.php?status=7&id=<?= $linha['edital_id'] ?>">Recebendo
                                        Recursos</a>
                                    <a href="edital/edital-alterar-status.php?status=8&id=<?= $linha['edital_id'] ?>">Analisando
                                        Recursos</a>
                                    <a href="edital/edital-alterar-status.php?status=9&id=<?= $linha['edital_id'] ?>">Resultado
                                        Publicado</a>
                                    <a
                                        href="edital/edital-alterar-status.php?status=10&id=<?= $linha['edital_id'] ?>">Finalizar</a>
                                    <a
                                        href="edital/edital-alterar-status.php?status=11&id=<?= $linha['edital_id'] ?>">Cancelar</a>
                                </div>
                            </div>
                            <a class="btn excluir" href="./edital/edital-excluir.php?id=<?= $linha['edital_id'] ?>"><span><i
                                        class="fa-solid fa-xmark"></i></span></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php } ?>