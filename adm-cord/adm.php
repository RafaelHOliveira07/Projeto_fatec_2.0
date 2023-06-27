<?php

require_once 'login/usuario-verifica-adm.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0">
    <link rel="stylesheet" href="./assets/css/padrao.css">
    <link rel="shortcut icon" href="./img/administracao.png" type="image/x-icon">
    <title>Adm - Inicio</title>
</head>

<body>
    <header class="cabecalho">
        <div class="titulo">
            <img src="./img/administracao.png" id="adm" alt="">
            <h2>Área Administrativa</h2>
        </div>
    </header>
    <div class="cabecalho-2"><a href="./login/usuario-logout.php">Sair</a></div>
    <section class="menu-adm">
        <ul>
            <li><a href="adm.php">Inicio</a></li>
            <li>
                <h2>Professores</h2>
            </li>
            <li><a href="adm.php?dir=professor&file=professor-inserir">Cadastrar Professor</a></li>
            <li><a href="adm.php?dir=professor&file=professor-gerenciar">Professor Cadastrados</a></li>
            <li>
                <h2>Cursos</h2>
            </li>
            <li><a href="adm.php?dir=cursos&file=cursos-inserir">Adicionar Curso</a></li>
            <li><a href="adm.php?dir=cursos&file=cursos-gerenciar">Gerenciar cursos</a></li>
            <li>
                <h2>Disciplinas</h2>
            </li>
            <li><a href="adm.php?dir=disciplinas&file=disciplinas-inserir">Adicionar Disciplina</a></li>
            <li><a href="adm.php?dir=disciplinas&file=disciplinas-gerenciar">Gerenciar Disciplinas</a></li>
            <li>
                <h2>Editais</h2>
            </li>
            <li><a href="adm.php?dir=edital&file=edital-inserir">Adicionar Editais</a></li>
            <li><a href="adm.php?dir=edital&file=edital-gerenciar">Gerenciar Editais</a></li>
            <li>
                <h2>Participantes</h2>
            </li>
            <li><a href="adm.php?dir=participantes&file=editais-publicados">Lista de Participantes</a></li>
        </ul>
    </section>
    <main class="principal">
        <?php
        if (empty($_GET))
            include("inicio.php");
        else
            include("{$_GET['dir']}/{$_GET['file']}.php");
        ?>
    </main>
    </section>
    <script type="text/javascript" src="./assets/js/funcoes.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/9869816a76.js" crossorigin="anonymous"></script>
</body>

</html>