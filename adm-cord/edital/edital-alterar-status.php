<?php

require_once "../../classes/Edital.php";

$id = $_GET['id'];

$edital = new Edital($id);

$edital->status_edital = $_GET['status'];

$edital->atualizarStatus();

header('Location: ../adm.php?dir=edital&file=edital-gerenciar');