<?php

require_once "../../classes/Edital.php";

$id = $_POST['id'];

$edital = new Edital($id);

if (isset($_FILES['pdf']['name']) && $_FILES['pdf']['error'] == 0) {

    $arquivo_tmo = $_FILES['pdf']['tmp_name'];
    $nomePdf = $_FILES['pdf']['name'];
    $extensao = strrchr($nomePdf, '.');
    $extensao = strtolower($extensao);

    if (strstr('.pdf', $extensao)) {

        $novoNome = md5(microtime()) . $extensao;
        $destino = '../../uploads/pdf/' . $novoNome;

        @move_uploaded_file($arquivo_tmo, $destino);

        $edital->errata = $novoNome;
    }
}

$edital->status_edital = $_POST['status'];

$edital->atualizarStatus();

$edital->atualizarErrata();

header('Location: ../adm.php?dir=edital&file=edital-gerenciar');