<?php

$usuario = $_POST['cpf'];

$local = $_POST['local'];
$edital_id = $_POST['edital_id'];

$sql = "SELECT * FROM tb_prof WHERE cpf='{$usuario}'";

$conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital', 'root', '');
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
if(password_verify($_POST['senha'], $linha['senha'])){
    $usuario_logado = $linha['cpf'];
    $id_logado = $linha['prof_id'];
}

if ($usuario_logado == null) {
    header('Location: ../index.php?dir=login&file=login&usuario=não');
} else {
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    $_SESSION['id_logado'] = $id_logado;
    if ($local == 1) {
        header("Location: ../index-logado.php?dir=edital&file=edital-confirmar&edital_id={$edital_id}");
    } else {
        header('Location: ../index-logado.php');
    }
}

?>