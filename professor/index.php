<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/books_14151.png" type="image/x-icon">
    <title>Portal Fatec</title>
    <link rel="stylesheet" href="./assets/css/padrao.css">
</head>

<body>
    <header class="cabecalho">
        <div class="texto">
            <div class="titulo">
                <img src="./img/fatec_itapira_logo.png" alt="">
                <a href="" hidden>
                    <h1>Portal de editais<span>Fatec Itapira</span></h1>
                </a>
            </div>
            <div class="img">
                <img src="./img/logo-cps-braso.png" alt="">
            </div>
        </div>
        <div class="box-menu">
            <nav class="nav" id="nav">
                <button aria-label="Abrir Menu" id="btn-mobile" class="btn-mobile" aria-haspopup="true"
                    aria-expanded="false"><span class="hamburguer"></span></button>
                <ul class="menu" role="menu">
                    <li class="item <?= (empty($_GET)) ? "active" : null ?>"><a href="index.php">Home</a></li>
                    <li class="item <?= (($_GET['file'] ?? 0) === 'cursos') ? "active" : null ?>"><a
                            href="index.php?dir=extras&file=cursos">Cursos</a></li>
                    <li class="item <?= (($_GET['file'] ?? 0) === 'duvidas') ? "active" : null ?>"><a
                            href="index.php?dir=extras&file=duvidas">Dúvidas</a></li>
                    <li class="item <?= (($_GET['file'] ?? 0) === 'sobre') ? "active" : null ?>"><a
                            href="index.php?dir=extras&file=sobre">Sobre</a></li>
                </ul>
            </nav>
            <a class="login <?= (($_GET['file'] ?? 0) === 'login') ? "active" : null ?>"
                href="index.php?dir=login&file=login">Login</a>
        </div>
    </header>
    <main class="principal">
        <?php
        (empty($_GET)) ? include("home.php") : include("{$_GET['dir']}/{$_GET['file']}.php");
        ?>
    </main>
    <footer class="rodape">
        <div class="faixa"></div>
        <div id="linkpe" class="reveal">
            <ul>
                <h2>Fatec Itapira:</h2>
                <li> Endereço: Rua Tereza Lera Paoletti, 570/590 - Jardim</li>
                <li> Bela Vista</li>
                <li> CEP: 13974-080</li>
                <li>Telefones: (19) 3843-1996</li>
                <li>Whatsapp: (19) 98933-6291 | (19) 3863-5210</li>
                <li>E-mail: contato@fatecitapira.edu.br</li>
            </ul>
        </div>
        <div id="redes">
            <div class="links reveal">
                <div class="social">
                    <a href="https://api.whatsapp.com/send?phone=551938635210&text=" target="_blank"><img
                            src="img/whatsapp.png" alt=""></a>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/fatecitapira" target="_blank"><img src="img/facebook.png"
                            alt=""></a>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/fatecitapira" target="_blank"><img src="img/twitter.png"
                            alt=""></a>
                </div>
                <div class="social">
                    <a href="https://www.youtube.com/channel/UChyGJgx8OzKqhHJBDaKdOZA" target="_blank"><img
                            src="img/youtube.png" alt=""></a>
                </div>
                <div class="social">
                    <a href="https://www.instagram.com/fatecdeitapira/" target="_blank"><img src="img/instagram.png"
                            alt=""> </a>
                </div>
            </div>
        </div>
    </footer>
    </footer>
    <script src="./assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/9869816a76.js" crossorigin="anonymous"></script>
</body>

</html>
<?php

if (($_GET['login'] ?? 0) === 'não') {
    echo "<script>alert('Por favor faça o login');</script>";
    unset($_GET['login']);
}

?>