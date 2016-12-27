<?php
namespace CasteloBranco\Cemet\Modules\Nota\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Nota
 *
 * @author Ricardo
 */
class Nota extends Product{
    private $idNota;
    private $avaliacao;
    private $nota;
    private $idDisciplina;
    private $idAluno;
    
    public function __construct(array $dados) {
        $this->setIdNota(isset($dados["idnota"])?$dados["idnota"]:0)
             ->setAvaliacao($dados["avaliacao"])
             ->setIdAluno($dados["idaluno"])
             ->setIdDisciplina($dados["iddisciplina"])
             ->setNota($dados["nota"]);
    }

    public function getIdNota() {
        return $this->idNota;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getIdDisciplina() {
        return $this->idDisciplina;
    }

    public function getIdAluno() {
        return $this->idAluno;
    }

    public function setIdNota($idNota) {
        $this->idNota = $idNota;
        return $this;
    }

    public function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    public function setNota($nota) {
        $this->nota = $nota;
        return $this;
    }

    public function setIdDisciplina($idDisciplina) {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
        return $this;
    }

    public function getParams() {
        return array(
            "idaluno" => \PDO::PARAM_INT,
            "iddisciplina" => \PDO::PARAM_INT,
            "idnota" => \PDO::PARAM_INT,
            "nota" => \PDO::PARAM_STR,
            "avaliacao" => \PDO::PARAM_STR,
        );
    }

    public function getValues() {
        return array(
            "idaluno"  => $this->getIdAluno(),
            "iddisciplina" => $this->getIdDisciplina(),
            "idnota" => $this->getIdNota(),
            "nota" => $this->getNota(),
            "avaliacao" => $this->getAvaliacao(),
        );
    }
}
