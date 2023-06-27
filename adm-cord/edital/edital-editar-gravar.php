<?php

require_once '../../classes/Edital.php';

$id = $_POST['edital_id'];
$edital  = new Edital($id);

$edital->curso_id = $_POST['curso_id'];
$edital->disci_id = $_POST['disci_id'];
$edital->num_edital = $_POST['num_edital'];
$edital->pdf = $_POST['pdf-gravado'];
$nome_pdf = $_POST['pdf-gravado'];

if (isset($_FILES['pdf']['name']) && $_FILES['pdf']['error'] == 0) {

    $arquivo_tmo = $_FILES['pdf']['tmp_name'];
    $nomePdf = $_FILES['pdf']['name'];
    $extensao = strrchr($nomePdf, '.');
    $extensao = strtolower($extensao);

    if (strstr('.pdf', $extensao)) {

        $novoNome = md5(microtime()) . $extensao;
        $destino = '../../uploads/pdf/' . $novoNome;

        @move_uploaded_file($arquivo_tmo, $destino);

        $edital->pdf = $novoNome;

        unlink("../../uploads/pdf/{$nome_pdf}");
    }

}

$edital->atualizar();

header('Location: ../adm.php?dir=edital&file=edital-gerenciar');