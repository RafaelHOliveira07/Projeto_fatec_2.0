<?php

require_once '../classes/Edital.php';

$id = $_GET['id'];

$edital = new Edital($id);

$edital->excluir();

header('Location: ../adm.php?dir=edital&file=edital-gerenciar');