<?php

require_once '../../classes/Professor.php';

$id = $_POST['prof_id'];
$professor = new Professor($id);

$professor->nome = $_POST['nome'];
$professor->sobrenome = $_POST['sobrenome'];
$professor->data_nasc = $_POST['data_nasc'];
$professor->email = $_POST['email'];
$professor->tel = $_POST['tel'];
$professor->cpf = $_POST['cpf'];
$professor->cep = $_POST['cep'];
$professor->endereco = $_POST['endereco'];
$professor->n_casa = $_POST['n_casa'];
$professor->bairro = $_POST['bairro'];
$professor->cidade = $_POST['cidade'];
$professor->estado = $_POST['estado'];

$professor->atualizar();

header('Location: ../adm.php?dir=professor&file=professor-gerenciar');