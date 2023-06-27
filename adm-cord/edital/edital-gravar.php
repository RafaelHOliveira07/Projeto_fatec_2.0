<?php

require_once "../../classes/Edital.php";

$edital = new Edital();

$edital->curso_id = $_POST['curso_id'];
$edital->disci_id = $_POST['disci_id'];
$edital->num_edital = $_POST['num_edital'];
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
    }
}

$edital->inserir();
header("Location: ../adm.php?dir=edital&file=edital-inserir");