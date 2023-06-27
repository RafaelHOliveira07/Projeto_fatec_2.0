<?php

require_once "../classes/Edital.php";
require_once "../classes/Participante.php";

$id = $_SESSION['id_logado'] ?? 0;
$lista2['edital_id'] = 0;

if (!empty($id)) {
    $participante = new Participante();

    $lista2 = $participante->listarPart($id);
}

$edital = new Edital();

$lista = $edital->listargpi();

?>
<link rel="stylesheet" href="./assets/css/editais.css">
<section class="conteudo">
    <section class="img gpi">
        <h1>Editais - GPI</h1>
    </section>
    <div class="faixa">
        <p>Confira abaixo os Editais disponiveis para curso GPI</p>
    </div>
    <section class="editais">
        <?php foreach ($lista as $linha): ?>
            <?php if (!($linha['edital_id'] == $lista2['edital_id'])) { ?>
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
                            <span>Visualizar edital: <a href="" target="_blank"><i
                                        class="fa-solid fa-file-pdf"></i></a></span>
                        </div>
                    </div>
                    <div class="botao">
                        <a href="index-logado.php?dir=edital&file=edital-confirmar&local=1&edital_id=<?= $linha['edital_id'] ?>">Inscrever-se</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php endforeach ?>
    </section>
</section>