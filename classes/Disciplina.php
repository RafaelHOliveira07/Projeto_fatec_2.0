<?php

class Disciplina
{
    public $disci_id;
    public $curso_id;
    public $sigla_curso;
    public $nome_disci;
    public $area_disci;
    public $data_hora;

    public function __construct($disci_id = false)
    {
        if ($disci_id) {

            $this->disci_id = $disci_id;

            $this->carregar();
        }
    }

    public function inserir()
    {

        $sql = "INSERT INTO tb_disciplinas (curso_id, nome_disci, area_disci, data_hora) VALUES (
            '" . $this->curso_id . "',
            '" . $this->nome_disci . "',
            '" . $this->area_disci . "',
            '" . $this->data_hora . "'
        )";

        include('conexao.php');

        $conexao->exec($sql);
    }

    public function listar()
    {
        $sql = "SELECT d.disci_id, c.sigla_curso, d.nome_disci, d.area_disci, d.data_hora FROM tb_disciplinas d JOIN tb_cursos c ON d.curso_id = c.curso_id ORDER BY disci_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function excluir()
    {
        $sql = "DELETE FROM tb_disciplinas WHERE disci_id=" . $this->disci_id;

        include('conexao.php');

        $conexao->exec($sql);
    }

    public function carregar()
    {
        $sql = "SELECT d.disci_id, d.curso_id, c.sigla_curso, d.nome_disci, d.area_disci, d.data_hora FROM tb_disciplinas d JOIN tb_cursos c ON d.curso_id = c.curso_id WHERE disci_id={$this->disci_id} ORDER BY disci_id";

        include('conexao.php');

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch();

        $this->curso_id = $linha['curso_id'];
        $this->nome_disci = $linha['nome_disci'];
        $this->area_disci = $linha['area_disci'];
        $this->data_hora = $linha['data_hora'];
        $this->sigla_curso = $linha['sigla_curso'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_disciplinas SET
                    curso_id = '$this->curso_id' ,
                    nome_disci = '$this->nome_disci' ,
                    area_disci = '$this->area_disci' ,
                    data_hora = '$this->data_hora' 
                WHERE disci_id = $this->disci_id ";

        include('conexao.php');
        $conexao->exec($sql);
    }

}