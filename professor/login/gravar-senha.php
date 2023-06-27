<?php

require_once "../../classes/Professor.php";

$prof_id = $_POST['prof_id'];
$redirecionar = $_POST['redirecionar'];

$professor = new Professor($prof_id);

$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$professor->senha = $senha;
$professor->recuperar_senha = '';


$professor->atualizarSenha();

if ($redirecionar == 0) {
    header("Location: ../index.php?dir=login&file=login");
} else {
    header("Location: ../index-logado.php?dir=perfil&file=perfil");
}