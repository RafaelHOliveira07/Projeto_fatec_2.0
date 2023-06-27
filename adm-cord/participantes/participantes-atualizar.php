<?php

require_once "../classes/Participante.php";

$id = $_GET['id'];

$participante = new Participante($id);

$participante->deferimento = 1;

$participante->atualizarDef();

header('Location: ../adm.php?dir=participantes&file=participantes-gerenciar');