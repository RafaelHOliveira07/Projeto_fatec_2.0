<?php

session_start();

$usuario = $_SESSION['usuario_logado'] ?? 0;
$edital_id = $_GET['edital_id'] ?? 0;
$sql = "SELECT * FROM tb_prof WHERE cpf='{$usuario}'";

$conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital', 'root', '');
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['cpf'];



if (!(($usuario) === ($usuario_logado))) {
    if (!empty($_GET['local'])) {
        header("Location: ./index.php?dir=login&file=login&login=não&local={$_GET['local']}&edital_id={$edital_id}");
    } else {
        header('Location: ./index.php?dir=login&file=login&login=não');
    }
}

?>