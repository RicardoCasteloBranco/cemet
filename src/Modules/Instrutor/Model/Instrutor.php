<?php
namespace CasteloBranco\Cemet\Modules\Instrutor\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Instrutor
 *
 * @author ricardo
 */
class Instrutor extends Product{
    private $idInstrutor;
    private $idPessoa;
    private $idDisciplina;
    private $tipoInstrutor;
    private $idTurma;
    private $desistencia;
    private $dataInscricao;
    private $dataDesistencia;
    private $matricula;
    
    public function __construct(array $dados) {
        $this->setIdInstrutor(isset($dados["idinstrutor"])?$dados["idinstrutor"]:0)
             ->setIdDisciplina($dados["iddisciplina"])
             ->setIdPessoa($dados["idpessoa"])
             ->setIdTurma($dados["idturma"])
             ->setDataInscricao(isset($dados["datainscricao"])?$dados["datainscricao"]:null)
             ->setDataDesistencia(isset($dados["datadesistencia"])?$dados["datadesistencia"]:null)
             ->setDesistencia(isset($dados["desistencia"])?$dados["desistencia"]:"0")
             ->setMatricula($dados["matricula"])
             ->setTipoInstrutor($dados["tipo_instrutor"]);
    }
    
    public function getIdInstrutor() {
        return $this->idInstrutor;
    }

    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function getIdDisciplina() {
        return $this->idDisciplina;
    }

    public function getTipoInstrutor() {
        return $this->tipoInstrutor;
    }

    public function getIdTurma() {
        return $this->idTurma;
    }

    public function getDesistencia() {
        return $this->desistencia;
    }

    public function getDataInscricao() {
        return $this->dataInscricao;
    }
    
    public function getDataDesistencia() {
        return $this->dataDesistencia;
    }

    
    public function getMatricula() {
        return $this->matricula;
    }

    public function setIdInstrutor($idInstrutor) {
        $this->idInstrutor = $idInstrutor;
        return $this;
    }

    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    public function setIdDisciplina($idDisciplina) {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function setTipoInstrutor($tipoInstrutor) {
        $this->tipoInstrutor = $tipoInstrutor;
        return $this;
    }

    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function setDesistencia($desistencia) {
        $this->desistencia = $desistencia;
        return $this;
    }

    public function setDataInscricao($dataInscricao) {
        $this->dataInscricao = $dataInscricao;
        return $this;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
        return $this;
    }
    
    public function setDataDesistencia($dataDesistencia) {
        $this->dataDesistencia = $dataDesistencia;
        return $this;
    }

    public function getParams() {
        return array(
            "idinstrutor" => \PDO::PARAM_INT,
            "idpessoa" => \PDO::PARAM_INT,
            "iddisciplina" => \PDO::PARAM_INT,
            "tipo_instrutor" => \PDO::PARAM_STR,
            "idturma" => \PDO::PARAM_INT,
            "desistencia" => \PDO::PARAM_STR,
            "matricula" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idinstrutor" => $this->getIdInstrutor(),
            "idpessoa" => $this->getIdPessoa(),
            "iddisciplina" => $this->getIdDisciplina(),
            "tipo_instrutor" => $this->getTipoInstrutor(),
            "idturma" => $this->getIdTurma(),
            "desistencia" => $this->getDesistencia(),
            "matricula" => $this->getMatricula()
        );
    }
    
    public function __clone() {
        return $this;
    }
}
