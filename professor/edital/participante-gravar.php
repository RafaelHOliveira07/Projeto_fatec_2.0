<?php

require_once "../../classes/Participante.php";

$participante = new Participante();

$participante->prof_id = $_POST['prof_id'];
$participante->edital_id = $_POST['edital_id'];
$prof_nome = "{$_POST['nome']} {$_POST['sobrenome']}";

$zip = new ZipArchive();
$fileName = "{$prof_nome}{$_POST['edital_id']}.zip";
$destino = '../../uploads/doc/' . $fileName;

$arquivo = isset($_FILES['documentos']) ? $_FILES['documentos'] : FALSE;
if ($zip->open($destino, ZipArchive::CREATE)) {
    for ($controle = 0; $controle < count($arquivo['name']); $controle++) {
        $zip->addFile($arquivo['tmp_name'][$controle], $arquivo['name'][$controle]);
    }
}

$zip->close();

$participante->doc = $fileName;

$participante->inserir();
header('Location: ../index-logado.php');