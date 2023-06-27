<?php

class Participante
{
    public $part_id;
    public $prof_id;
    public $edital_id;
    public $doc;
    public $deferimento;
    public $convocacao;
    public $motivo;

    public function __construct($part_id = false)
    {
        if ($part_id) {

            $this->part_id = $part_id;

            $this->carregar();
        }
    }

    public function inserir()
    {

        $sql = "INSERT INTO tb_participantes (prof_id, edital_id, doc) VALUES (
            '" . $this->prof_id . "',
            '" . $this->edital_id . "',
            '" . $this->doc . "'
        )";

        include('Conexao.php');

        $conexao->exec($sql);
    }

    public function listar($id)
    {
        $sql = "SELECT pa.part_id, p.nome, p.sobrenome, p.cpf, p.cep, p.tel, pa.doc, pa.deferimento FROM tb_participantes pa JOIN tb_prof p ON pa.prof_id = p.prof_id WHERE pa.edital_id = {$id} ORDER BY part_id";

        include('Conexao.php');

        $query = $conexao->query($sql);

        $lista = $query->fetchALL();

        return $lista;
    }

    public function listarPart($id)
    {
        $sql = "SELECT edital_id FROM tb_participantes WHERE prof_id = {$id}";

        include('Conexao.php');

        $query = $conexao->query($sql);

        $lista = $query->fetch();

        return $lista;
    }

    public function listarAdm()
    {
        $sql = "SELECT * FROM tb_prof p JOIN tb_participantes pa ON p.prof_id = pa.prof_id JOIN tb_edital e ON pa.edital_id = e.edital_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE pa.deferimento = 0 ORDER BY part_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $query = $conexao->query($sql);

        $lista = $query->fetchALL();

        return $lista;
    }
   public function listarCord()
    {
        $sql = "SELECT * FROM tb_prof p JOIN tb_participantes pa ON p.prof_id = pa.prof_id JOIN tb_edital e ON pa.edital_id = e.edital_id JOIN tb_cursos c ON e.curso_id = c.curso_id WHERE pa.deferimento = 1 ORDER BY part_id";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $query = $conexao->query($sql);

        $lista = $query->fetchALL();

        return $lista;
    }

    public function excluir()
    {
        $sql = "DELETE FROM tb_participantes WHERE part_id=" . $this->part_id;

        include('Conexao.php');

        $conexao->exec($sql);
    }

    public function carregar()
    {
        $sql = "SELECT pa.part_id, p.nome, p.sobrenome, p.cpf, pa.deferimento FROM tb_participantes pa JOIN tb_prof p ON pa.prof_id = p.prof_id WHERE part_id={$this->part_id} ORDER BY part_id";

        include('Conexao.php');

        $resultado = $conexao->query($sql);

        $linha = $resultado->fetch();

        $this->part_id = $linha['part_id'];
        $this->prof_id = $linha['prof_id'];
        $this->edital_id = $linha['edital_id'];
        $this->deferimento = $linha['deferimento'];
    }

    public function atualizar()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_edital SET
                    part_id = '$this->part_id' ,
                    prof_id = '$this->prof_id' ,
                    edital_id = '$this->edital_id'
                WHERE edital_id = $this->edital_id ";

        include('Conexao.php');
        $conexao->exec($sql);
    }

    public function atualizarDef()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_participantes SET
                    deferimento = '$this->deferimento' 
                WHERE part_id = $this->part_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $conexao->exec($sql);
    }

    public function atualizarConv()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_participantes SET
                    convocacao = '$this->convocacao' 
                WHERE part_id = $this->part_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $conexao->exec($sql);
    }

    public function atualizarMotivo()
    {
        // Query SQL para atualizar uma turma no banco de dados pelo id
        $sql = "UPDATE tb_participantes SET
                    motivo = '$this->motivo' 
                WHERE part_id = $this->part_id ";

        $conexao = new PDO('mysql:host=127.0.0.1;dbname=portal_edital','root','');
        $conexao->exec($sql);
    }

    public function identStatus($status)
    {
        switch ($status) {
            case 0:
                return "Inscrito";
            case 1:
                return "Deferido";
            case 2:
                return "Indeferido";
            case 3:
                return "Convocado";
            case 4:
                return "Recurso Registrado";
            case 5:
                return "Recurso Indeferido";
        }
    }
}