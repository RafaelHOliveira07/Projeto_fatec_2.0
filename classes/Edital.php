<?php

class Edital
{
    public $edital_id;
    public $curso_id;
    public $sigla_curso;
    public $disci_id;
    public $nome_disci;
    public $num_edital;
    public $pdf;
    public $status_edital;
    public $errata;


    public function __construct($edital_id = false)
    {
        if ($edital_id) {

            $this->edital_id = $edital_id;

            $this->carregar();
        }
    }

    public function inserir()
    {

        $sql = "INSERT INTO tb_edital (edital_id, curso_id, disci_id, num_edital, pdf) VALUES (
            '" . $this->edital_id . "',
            '" . $this->curso_id . "',
            '" . $this->disci_id . "',
            '" . $this->num_edital . "',
            '" . $this->pdf . "'
        )";

        include('Conexao.php');

        $conexao->exec($sql);
    }

    public function listar()
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital, e.pdf, e.errata, e.status_edital  FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id ORDER BY edital_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function listarInscritos($id)
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital, e.pdf, e.status_edital, p.deferimento, p.convocacao, p.part_id, e.errata, p.motivo FROM tb_participantes p JOIN tb_edital e ON p.edital_id = e.edital_id JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE p.prof_id = {$id} ORDER BY edital_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function listarPublicados()
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital, e.pdf, e.status_edital  FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE status_edital = 1 ORDER BY edital_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function listardsm()
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital, e.errata FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE c.sigla_curso = 'DSM'AND e.status_edital <> 0 AND e.status_edital <> 4 AND e.status_edital <> 10 AND e.status_edital <> 11 ORDER BY e.edital_id";

        include('Conexao.php');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }
    
    public function listargpi()
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital  FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE c.sigla_curso = 'GPI' AND e.status_edital <> 0 AND e.status_edital <> 4 AND e.status_edital <> 10 AND e.status_edital <> 11 ORDER BY edital_id";

        include('Conexao.php');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function listarge()
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital  FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE c.sigla_curso = 'GE' AND e.status_edital <> 0 AND e.status_edital <> 4 AND e.status_edital <> 10 AND e.status_edital <> 11 ORDER BY edital_id";

        include('Conexao.php');

        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function listargti()
    {
        $sql = "SELECT e.edital_id, c.sigla_curso, d.nome_disci, d.area_disci,d.data_hora, e.num_edital  FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE c.sigla_curso = 'GTI' AND e.status_edital <> 0 AND e.status_edital <> 4 AND e.status_edital <> 10 AND e.status_edital <> 11 ORDER BY edital_id";

        include('Conexao.php');
        $resultado = $conexao->query($sql);

        $lista = $resultado->fetchALL();

        return $lista;
    }

    public function excluir()
    {
        $sql = "DELETE FROM tb_edital WHERE edital_id=" . $this->edital_id;

        include('Conexao.php');

        $conexao->exec($sql);
    }

    public function carregar()
    {
        $sql = "SELECT e.edital_id, c.curso_id, c.sigla_curso, d.disci_id, d.nome_disci, e.num_edital, e.pdf FROM tb_edital e JOIN tb_disciplinas d ON e.disci_id = d.disci_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE edital_id={$this->edital_id} ORDER BY edital_id";

        include('Conexao.php');

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch();

        $this->edital_id = $linha['edital_id'];
        $this->curso_id = $linha['curso_id'];
        $this->sigla_curso = $linha['sigla_curso'];
        $this->disci_id = $linha['disci_id'];
        $this->nome_disci = $linha['nome_disci'];
        $this->num_edital = $linha['num_edital'];
        $this->pdf = $linha['pdf'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_edital SET
                    edital_id = '$this->edital_id' ,
                    curso_id = '$this->curso_id' ,
                    disci_id = '$this->disci_id' ,
                    num_edital = '$this->num_edital',
                    pdf = '$this->pdf'
                WHERE edital_id = $this->edital_id ";

        include('Conexao.php');
        $conexao->exec($sql);
    }

    public function atualizarStatus()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_edital SET
                    status_edital = '$this->status_edital' 
                WHERE edital_id = $this->edital_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $conexao->exec($sql);
    }

    public function atualizarErrata()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_edital SET
                    errata = '$this->errata' 
                WHERE edital_id = $this->edital_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $conexao->exec($sql);
    }

    public function identStatus($status)
    {
        switch ($status) {
            case 0:
                return "Cadastrado";
            case 1:
                return "Publicado";
            case 2:
                return "Errata Publicada";
            case 3:
                return "Em análise";
            case 4:
                return "Encerrado sem inscrições";
            case 5:
                return "Deferimentos Publicados";
            case 6:
                return "Resultado Parcial Publicado";
            case 7:
                return "Recebendo Recursos";
            case 8:
                return "Analisando Recursos";
            case 9:
                return "Resultado Publicado";
            case 10:
                return "Finalizado";
            case 11:
                return "Cancelado";
        }
    }

}