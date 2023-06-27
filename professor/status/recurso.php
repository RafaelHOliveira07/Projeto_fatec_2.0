<?php

require_once "../../classes/Participante.php";

$id = $_GET['id'];

$participante = new Participante($id);

$participante->deferimento = $_GET['status'];

$participante->atualizarDef();

header("Location: ../index-logado.php?dir=perfil&file=perfil");