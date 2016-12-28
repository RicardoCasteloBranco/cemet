<?php
namespace CasteloBranco\Cemet\Modules\Falta\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Falta
 *
 * @author ricardo
 */
class Falta extends Product{
    private $idAluno;
    private $idDisciplina;
    private $data;
    private $qtdFaltas;
    private $idFalta;
    
    public function __construct(array $dados) {
        $this->setIdFalta(isset($dados["idfalta"])?$dados["idfalta"]:0)
             ->setIdAluno($dados["idaluno"])
             ->setIdDisciplina($dados["iddisciplina"])
             ->setData($dados["data"])
             ->setQtdFaltas($dados["qtd_faltas"]);
    }
    
    public function getIdAluno() {
        return $this->idAluno;
    }

    public function getIdDisciplina() {
        return $this->idDisciplina;
    }

    public function getData() {
        return $this->data;
    }

    public function getQtdFaltas() {
        return $this->qtdFaltas;
    }

    public function getIdFalta() {
        return $this->idFalta;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
        return $this;
    }

    public function setIdDisciplina($idDisciplina) {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function setQtdFaltas($qtdFaltas) {
        $this->qtdFaltas = $qtdFaltas;
        return $this;
    }

    public function setIdFalta($idFalta) {
        $this->idFalta = $idFalta;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idfalta" => \PDO::PARAM_INT,
            "iddisciplina" => \PDO::PARAM_INT,
            "idaluno" => \PDO::PARAM_INT,
            "data" => \PDO::PARAM_STR,
            "qtd_faltas" => \PDO::PARAM_INT
        );
    }

    public function getValues() {
        return array(
            "idfalta" => $this->getIdFalta(),
            "iddisciplina" => $this->getIdDisciplina(),
            "idaluno" => $this->getIdAluno(),
            "data" => $this->getData(),
            "qtd_faltas" => $this->getQtdFaltas()
        );
    }
}
