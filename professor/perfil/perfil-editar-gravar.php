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
if (isset($_FILES['img-perfil']['name']) && $_FILES['img-perfil']['error'] == 0) {

    $arquivo_tmo = $_FILES['img-perfil']['tmp_name'];
    $nomeImagem = $_FILES['img-perfil']['name'];
    $extensao = strrchr($nomeImagem, '.');
    $extensao = strtolower($extensao);

    if (strstr('.jpg;.jpeg;.png', $extensao)) {

        $novoNome = md5(microtime()) . $extensao;
        $destino = '../../uploads/img/' . $novoNome;

        @move_uploaded_file($arquivo_tmo, $destino);

        $professor->img = $novoNome;
    }
}

$professor->atualizar();

header('Location: ../index-logado.php?dir=perfil&file=perfil');