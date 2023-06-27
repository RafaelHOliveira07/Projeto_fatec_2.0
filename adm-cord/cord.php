<?php

require_once 'login/usuario-verifica-cord.php';

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
    <title>Cord - Inicio</title>
</head>

<body>
    <header class="cabecalho">
        <div class="titulo">
            <img src="./img/administracao.png" id="adm" alt="">
            <h2>Coordenação</h2>
        </div>
    </header>
    <div class="cabecalho-2"><a href="./login/usuario-logout.php">Sair</a></div>
    <section class="menu-adm">
        <ul>
            <li><a href="cord.php">Inicio</a></li>
            <li>
                <h2>Deferimento</h2>
            </li>
            <li><a href="cord.php?dir=deferir&file=editais-publicados-cord">Lista de participantes</a></li>
        </ul>
    </section>
    <main class="principal">
        <?php
        if (empty($_GET)) include("inicio-cord.php");
        else include("{$_GET['dir']}/{$_GET['file']}.php");
        ?>
    </main>
    </section>
    <script type="text/javascript" src="./assets/js/funcoes.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/9869816a76.js" crossorigin="anonymous"></script>
</body>

</html>