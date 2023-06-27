<?php

require_once '../../classes/Participante.php';

$id = $_GET['id'];
$edital_id = $_GET['edital_id'];

$participante = new Participante($id);

$participante->excluir();

header("Location: ../adm.php?dir=participantes&file=participantes-gerenciar&id={$edital_id}");