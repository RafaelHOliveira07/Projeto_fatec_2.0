<?php

require_once '../../classes/Disciplina.php';

$id = $_POST['disci_id'];
$disciplina = new Disciplina($id);

$disciplina->curso_id = $_POST['curso_id'];
$disciplina->nome_disci = $_POST['nome_disci'];
$disciplina->area_disci = $_POST['area_disci'];
$disciplina->data_hora = $_POST['data_hora'];

$disciplina->atualizar();

header('Location: ../adm.php?dir=disciplinas&file=disciplinas-gerenciar');