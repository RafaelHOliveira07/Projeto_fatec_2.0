<?php

require_once 'login/usuario-verifica-adm.php';

require_once "../classes/Curso.php";

$curso = new Curso();

$lista = $curso->listar();

?>
<link rel="stylesheet" href="./assets/css/forms.css">
<div class="central">
    <form action="./disciplinas/disciplinas-gravar.php" method="post">
        <h2>Adicionar Disciplina</h2>
        <div class="inputs">
            <label for="curso_id">Selecione o Curso da Disciplina</label>
            <select name="curso_id" id="curso_id">
                <option value="">Selecione...</option>
                <?php
                foreach ($lista as $linha):
                    echo "<option value='{$linha['curso_id']}'>
                                         {$linha['nome_curso']}
                          </option>";
                endforeach
                ?>
            </select>
        </div>
        <div class="inputs">
            <label for="nome_disci">Insira o nome correspondente a Disciplina</label>
            <input type="text" name="nome_disci" id="nome_disci" placeholder="Disciplina">
        </div>
        <div class="inputs">
            <label for="area_disci">Insira a área correspondente a Disciplina</label>
            <input type="text" name="area_disci" id="area_disci" placeholder="Disciplina">
        </div>
        <div class="inputs">
            <label for="data_hora">Insira o dia e horário correspondente a Disciplina</label>
            <select name="data_hora" id="data_hora">
                <option value="">Selecione...</option>
                <option value="Segunda-feira das 19:00 as 22:30">Segunda-feira das 19:00 as 22:30</option>
                <option value="Segunda-feira das 19:00 as 20:30">Segunda-feira das 19:00 as 20:30</option>
                <option value="Segunda-feira das 21:00 as 22:30">Segunda-feira das 21:00 as 22:30</option>
                <option value="Terça-feira das 19:00 as 22:30">Terça-feira das 19:00 as 22:30</option>
                <option value="Terça-feira das 19:00 as 20:30">Terça-feira das 19:00 as 20:30</option>
                <option value="Terça-feira das 21:00 as 22:30">Terça-feira das 21:00 as 22:30</option>
                <option value="Quarta-feira das 19:00 as 22:30">Quarta-feira das 19:00 as 22:30</option>
                <option value="Quarta-feira das 19:00 as 20:30">Quarta-feira das 19:00 as 20:30</option>
                <option value="Quarta-feira das 21:00 as 22:30">Quarta-feira das 21:00 as 22:30</option>
                <option value="Quinta-feira das 19:00 as 22:30">Quinta-feira das 19:00 as 22:30</option>
                <option value="Quinta-feira das 19:00 as 20:30">Quinta-feira das 19:00 as 20:30</option>
                <option value="Quinta-feira das 21:00 as 22:30">Quinta-feira das 21:00 as 22:30</option>
                <option value="Sexta-feira das 19:00 as 22:30">Sexta-feira das 19:00 as 22:30</option>
                <option value="Sexta-feira das 19:00 as 20:30">Sexta-feira das 19:00 as 20:30</option>
                <option value="Sexta-feira das 21:00 as 22:30">Sexta-feira das 21:00 as 22:30</option>
                <option value="Sábado das 7:40 as 11:30">Sábado das 7:40 as 11:30</option>
                <option value="Sábado das 7:40 as 9:20">Sábado das 7:40 as 9:20</option>
                <option value="Sábado das 9:30 as 12:50">Sábado das 9:30 as 12:50</option>
                <option value="Sábado das 11:30 as 12:50">Sábado das 11:30 as 12:50</option>
            </select>
        </div>
        <button>Confirmar</button>
    </form>
</div>