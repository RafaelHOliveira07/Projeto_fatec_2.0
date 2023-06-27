<?php

require_once "../../classes/Participante.php";

$id = $_GET['id'];

$participante = new Participante($id);

$participante->deferimento = $_GET['status'];

if ($_GET['status'] == 2) {
    $participante->motivo = $_POST['motivo'];
    $participante->atualizarMotivo();
}

$participante->atualizarDef();

header("Location: ../cord.php?dir=deferir&file=deferimento&id={$_GET['edital_id']}");