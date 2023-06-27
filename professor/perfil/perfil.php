<?php

require_once 'login/usuario-verifica.php';

require_once "../classes/Professor.php";

$id = $_SESSION['id_logado'];

$professor = new Professor($id);

require_once '../classes/Edital.php';

$edital = new Edital();

$lista = $edital->listarInscritos($id);

?>
<link rel="stylesheet" href="./assets/css/perfil.css">
<section class="conteudo">
    <section class="perfil">
        <div class="foto-perfil">
            <img src="<?= (!empty($professor->img)) ? '../uploads/img/' . $professor->img : './img/1_g09N-jl7JtVjVZGcd-vL2g.jpeg' ?>" alt="">
        </div>
        <form>
            <div class="info">
                <div class="linha-form">
                    <div class="inputs">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" value="<?= $professor->nome ?>" disabled>
                    </div>
                    <div class="inputs">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" value="<?= $professor->sobrenome ?>"
                            disabled>
                    </div>
                </div>
                <div class="linha-form">
                    <div class="inputs">
                        <label for="data_nasc">Data de Nascimento</label>
                        <input type="text" name="data_nasc" id="data_nasc" value="<?php $datetime = new DateTime($professor->data_nasc); echo $datetime->format('d/m/Y') ?>"
                            disabled>
                    </div>
                    <div class="inputs">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" value="<?= $professor->email ?>" disabled>
                    </div>
                </div>
                <div class="linha-form">
                    <div class="inputs">
                        <label for="tel">Telefone</label>
                        <input type="tel" name="tel" id="tel" value="<?= $professor->tel ?>" maxlength="15"
                            onkeyup="telefone(event)" disabled>
                    </div>
                    <div class="inputs">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" value="<?= $professor->cpf ?>" disabled>
                    </div>
                </div>
                <div class="linha-form">
                    <div class="inputs">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" value="<?= $professor->cep ?>" disabled>
                    </div>
                    <div class="inputs">
                        <label for="endereco">Endereco</label>
                        <input type="text" name="endereco" id="endereco" value="<?= $professor->endereco ?>" disabled>
                    </div>
                </div>
                <div class="linha-form">
                    <div class="inputs">
                        <label for="n_casa">Número</label>
                        <input type="text" name="n_casa" id="n_casa" value="<?= $professor->n_casa ?>" disabled>
                    </div>
                    <div class="inputs">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="<?= $professor->bairro ?>" disabled>
                    </div>
                </div>
                <div class="linha-form">
                    <div class="inputs">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" value="<?= $professor->cidade ?>" disabled>
                    </div>
                    <div class="inputs">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" id="estado" value="<?= $professor->estado ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="botoes">
                <a class="btn" href="index-logado.php?dir=perfil&file=perfil-editar&id='<?= $id ?>'">editar</a>
                <a class="btn" href="index-logado.php?dir=login&file=atualizar-senha&id=<?= $id ?>">Alterar Senha</a>
            </div>
        </form>
    </section>
    <div class="titulo">
        <h2>Inscrições</h2>
    </div>
    <section class="editais">
        <?php foreach ($lista as $linha): ?>
            <div class="edital reveal">
                <ul class="info-topo">
                    <li><span>Edital -
                            <?php echo $linha['sigla_curso'] ?>
                        </span></li>
                    <li><span><span>Disciplina:
                                <?php echo $linha['nome_disci'] ?>
                            </span></li>
                    <li><span>Área correspondente:
                            <?php echo $linha['area_disci'] ?>
                        </span></li>
                    <div class="status">
                        <span>Status:</span>
                        <div class="info-status">
                            <span>Publicado</span>
                        </div>
                    </div>
                </ul>
                <div class="info-corpo">
                    <div class="detalhes">
                        <span>Horario/data das aulas: <br>
                            <?php echo $linha['data_hora'] ?>
                        </span>
                        <span>Número do Edital:
                            <?php echo $linha['num_edital'] ?>
                        </span>
                        <div class="linkpdf">
                            <span>Visualizar edital: <a href="../uploads/pdf/<?= $linha['pdf'] ?>" target="_blank"><i
                                        class="fa-solid fa-file-pdf"></i></a></span>
                        </div>
                        <?php if (!empty($linha['errata'])) { ?>
                            <div class="linkpdf">
                                <span>Errata: <a href="../uploads/pdf/<?= $linha['errata'] ?>" target="_blank"><i
                                            class="fa-solid fa-file-pdf"></i></a></span>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($linha['deferimento'] == 1) { ?>
                        <div class="status-part">
                            <span>Deferido</span>
                        </div>
                    <?php } elseif ($linha['deferimento'] == 2) { ?>
                        <div class="status-part">
                            <span>Indeferido</span>
                            <div class="botao">
                                <a href="status/recurso.php?status=4&id=<?= $linha['part_id'] ?>">Recurso
                                </a>
                            </div>
                        </div>
                        <div class="popup-fundo">
                            <div class="popup">
                                <div class="popup-conteudo">
                                    <h2>Motivo do Indeferimento</h2>
                                    <p><?= $linha['motivo'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } elseif (($linha['deferimento'] == 3) and ($linha['convocacao'] == 0)) { ?>
                        <div class="status-part">
                            <span>Convocado</span>
                            <div class="botoes">
                                <div class="botao">
                                    <a href="status/convocacao.php?status=1&id=<?= $linha['part_id'] ?>">Aceitar
                                    </a>
                                </div>
                                <div class="botao">
                                    <a href="status/convocacao.php?status=2&id=<?= $linha['part_id'] ?>">Recusar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } elseif (($linha['deferimento'] == 3) and ($linha['convocacao'] == 1)) { ?>
                        <div class="status-part">
                            <span>Convocação Aceita</span>
                        </div>
                    <?php } elseif (($linha['deferimento'] == 3) and ($linha['convocacao'] == 2)) { ?>
                        <div class="status-part">
                            <span>Convocação Recusada</span>
                        </div>
                    <?php } elseif ($linha['deferimento'] == 4) { ?>
                        <div class="status-part">
                            <span>Recurso em Análise</span>
                        </div>
                    <?php } elseif ($linha['deferimento'] == 5) { ?>
                        <div class="status-part">
                            <span>Recurso Indeferido</span>
                        </div>
                        <div class="popup-fundo">
                            <div class="popup">
                                <div class="popup-conteudo">
                                    <h2>Motivo do Indeferimento</h2>
                                    <p>
                                        <?= $linha['motivo'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="status-part">
                            <span>Inscrito</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</section>