<?php

require_once 'login/usuario-verifica.php';

?>
<link rel="stylesheet" href="./assets/css/inicio.css">
<section class="conteudo">
    <section class="img-inicio">
        <div class="texto">
            <ul>
                <li>
                    <h1> Seja bem vindo</h1>
                </li>
                <li>
                    <p> ao portal de editais da <a href=""> Fatec Itapira</a></p>
                </li>
            </ul>
        </div>
    </section>
    <div class="faixa"></div>
    <div class="titulo-cursos">
        <h2>Cursos Disponiveis</h2>
    </div>
    <section class="cursos">
        <a href="index-logado.php?dir=edital&file=dsm">
            <div class="card reveal" id="dsm">
                <div class="card-texto">
                    <h3>DSM - Desenvolvimento de Software Multiplataforma</h3>
                    <p>O profissional pode projetar, desenvolver e testar softwares para múltiplas plataformas,
                        aplicações em nuvem e internet das coisas.</p>
                </div>
                <div class="card-hover">
                    <p>Acesse os editais desse curso</p>
                </div>
            </div>
        </a>
        <a href="index-logado.php?dir=edital&file=ge">
            <div class="card reveal" id="ge">
                <div class="card-texto">
                    <h3>GE - Gestão Empresarial</h3>
                    <p>Planeja atividades e recursos, na organização do trabalho e na gestão de pessoas.</p>
                </div>
                <div class="card-hover">
                    <p>Acesse os editais desse curso</p>
                </div>
            </div>
        </a>
    </section>
    <section class="cursos">
        <a href="index-logado.php?dir=edital&file=gpi">
            <div class="card reveal" id="gpi">
                <div class="card-texto">
                    <h3>GPI - Gestão da Produção Industrial</h3>
                    <p>Organizações industriais, com a busca da melhoria da qualidade e produtividade industrial.</p>
                </div>
                <div class="card-hover">
                    <p>Acesse os editais desse curso</p>
                </div>
            </div>
        </a>
        <a href="index-logado.php?dir=edital&file=gti">
            <div class="card reveal" id="gti">
                <div class="card-texto">
                    <h3>GTI - Gestão da Tecnologia da Informação</h3>
                    <p>Segmento da área de informática que abrange a administração dos recursos de infra-estrutura
                        física e lógica dos ambientes informatizados.</p>
                </div>
                <div class="card-hover">
                    <p>Acesse os editais desse curso</p>
                </div>
            </div>
        </a>
    </section>
</section>