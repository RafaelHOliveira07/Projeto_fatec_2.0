<?php

$conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');

$curso = $_GET['curso_id'];

$query = $conexao->prepare("SELECT disci_id, nome_disci FROM tb_disciplinas WHERE curso_id=:curso_id ORDER BY disci_id");

$data = ['curso_id' => $curso];

$query->execute($data);

$lista = $query->fetchALL(PDO::FETCH_ASSOC);

echo '<option value="">Selecione...</option>';
foreach($lista as $option) {
    ?>
    <option value="<?php echo $option['disci_id']?>"><?php echo $option['nome_disci']?></option>
    <?php
}