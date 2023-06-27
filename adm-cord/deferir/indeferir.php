<?php

require_once "../../classes/Participante.php";

$id = $_POST['id'];

$participante = new Participante($id);

$participante->deferimento = $_POST['status'];

$participante->motivo = $_POST['motivo'];

$participante->atualizarMotivo();

$participante->atualizarDef();

header("Location: ../cord.php?dir=deferir&file=deferimento&id={$_POST['edital_id']}");