<?php

require_once "../../classes/Participante.php";

$id = $_GET['id'];

$participante = new Participante($id);

$participante->convocacao = $_GET['status'];

$participante->atualizarConv();

header("Location: ../index-logado.php?dir=perfil&file=perfil");