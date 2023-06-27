<?php

session_start();

$usuario = $_SESSION['usuario_logado'] ?? 0;
$sql = "SELECT * FROM tb_admin WHERE usuario='{$usuario}'";

include('../classes/Conexao.php');
$resultado = $conexao->query($sql);
$linha = $resultado->fetch();
$usuario_logado = $linha['usuario'];

if(!(($usuario) === ($usuario_logado))){
    //Você não tem acesso a esta funcionalidade
    header('Location: ./index.php');
}

?>