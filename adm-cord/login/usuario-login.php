<?php

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tb_admin WHERE usuario='{$usuario}' and senha='{$senha}'";

$sql2 = "SELECT * FROM tb_cord WHERE usuario='{$usuario}' and senha='{$senha}'";

$conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital', 'root', '');
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['usuario'];

if ($usuario_logado == null) {
    $resultado = $conexao->query($sql2);
    $linha = $resultado->fetch();
    $usuario_logado = $linha['usuario'];
    if ($usuario_logado == null) {
        header('Location: usuario-erro.php');
    } else {
        session_start();
        $_SESSION['usuario_logado'] = $usuario_logado;
        header('Location: ../cord.php');
    }
} else {
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    header('Location: ../adm.php');
}


?>