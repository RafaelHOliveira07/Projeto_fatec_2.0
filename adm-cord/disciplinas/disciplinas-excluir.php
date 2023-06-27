<?php

require_once '../../classes/Disciplina.php';

$id = $_GET['id'];

$disciplina = new Disciplina($id);

$disciplina->excluir();

header('Location: ../adm.php?dir=disciplinas&file=disciplinas-gerenciar');