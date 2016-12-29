<?php
namespace CasteloBranco\Cemet\Modules\Turma\Model;
use CasteloBranco\Cemet\Factory\Product;

/**
 * Description of Turma
 *
 * @author ricardo
 */
class Turma extends Product{
    private $idTurma;
    private $companhia;
    private $turma;
    private $dataInicio;
    private $dataFim;
    
    public function __construct(array $dados) {
        $this->setIdTurma(isset($dados["idturma"])?$dados["idturma"]:0)
             ->setDataFim($dados["datafim"])
             ->setDataInicio($dados["datainicio"])
             ->setCompanhia($dados["companhia"])
             ->setTurma($dados["turma"]);
    }
    
    public function getIdTurma() {
        return $this->idTurma;
    }

    public function getCompanhia() {
        return $this->companhia;
    }

    public function getTurma() {
        return $this->turma;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
        return $this;
    }
    
    public function setCompanhia($companhia) {
        $this->companhia = $companhia;
        return $this;
    }

    public function setTurma($turma) {
        $this->turma = $turma;
        return $this;
    }

    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    public function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idturma" => \PDO::PARAM_INT,
            "companhia" => \PDO::PARAM_INT,
            "turma" => \PDO::PARAM_STR,
            "datainicio" => \PDO::PARAM_STR,
            "datafim" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idturma" => $this->getIdTurma(),
            "companhia" => $this->getCompanhia(),
            "turma" => $this->getTurma(),
            "datainicio" => $this->getDataInicio(),
            "datafim" => $this->getDataFim()
        );
    }
}
