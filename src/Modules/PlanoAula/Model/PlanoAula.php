<?php
namespace CasteloBranco\Cemet\Modules\PlanoAula\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of PlanoAula
 *
 * @author ricardo
 */
class PlanoAula extends Product{
    private $idPlano;
    private $idInstrutor;
    private $data;
    private $turno;
    private $metodologia;
    private $meios;
    private $avaliacao;
    private $qtdAula;
    private $idAula;
    private $dataCriacao;
    private $atualizacao;


    public function __construct(array $dados) {
        $this->setIdPlano(isset($dados["idplano"])?$dados["idplano"]:0)
             ->setAtualizacao($dados["atualizacao"])
             ->setAvaliacao($dados["avaliacao"])
             ->setData($dados["data"])
             ->setIdAula($dados["idaula"])
             ->setIdInstrutor($dados["idinstrutor"])
             ->setMeios($dados["meios"])
             ->setMetodologia($dados["metodologia"])
             ->setQtdAula($dados["qtdaula"])
             ->setTurno($dados["turno"]);
    }
    
    public function getIdPlano() {
        return $this->idPlano;
    }

    public function getIdInstrutor() {
        return $this->idInstrutor;
    }

    public function getData() {
        return $this->data;
    }

    public function getTurno() {
        return $this->turno;
    }

    public function getMetodologia() {
        return $this->metodologia;
    }

    public function getMeios() {
        return $this->meios;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function getQtdAula() {
        return $this->qtdAula;
    }

    public function getIdAula() {
        return $this->idAula;
    }
    
    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function getAtualizacao() {
        return $this->atualizacao;
    }

    
    public function setIdPlano($idPlano) {
        $this->idPlano = $idPlano;
        return $this;
    }

    public function setIdInstrutor($idInstrutor) {
        $this->idInstrutor = $idInstrutor;
        return $this;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function setTurno($turno) {
        $this->turno = $turno;
        return $this;
    }

    public function setMetodologia($metodologia) {
        $this->metodologia = $metodologia;
        return $this;
    }

    public function setMeios($meios) {
        $this->meios = $meios;
        return $this;
    }

    public function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    public function setQtdAula($qtdAula) {
        $this->qtdAula = $qtdAula;
        return $this;
    }

    public function setIdAula($idAula) {
        $this->idAula = $idAula;
        return $this;
    }
    
    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
        return $this;
    }

    public function setAtualizacao($atualizacao) {
        $this->atualizacao = $atualizacao;
        return $this;
    }

        
    public function getParams() {
        return array(
            "idplano" => \PDO::PARAM_INT,
            "idinstrutor" => \PDO::PARAM_INT,
            "data" => \PDO::PARAM_STR,
            "turno" => \PDO::PARAM_INT,
            "metodologia" => \PDO::PARAM_STR,
            "meios" => \PDO::PARAM_STR,
            "avaliacao" => \PDO::PARAM_STR,
            "qtdaula" => \PDO::PARAM_INT,
            "idaula" => \PDO::PARAM_INT
        );
    }

    public function getValues() {
        return array(
            "idplano" => $this->getIdPlano(),
            "idinstrutor" => $this->getIdInstrutor(),
            "data" => $this->getData(),
            "turno" => $this->getTurno(),
            "metodologia" => $this->getMetodologia(),
            "meios" => $this->getMeios(),
            "avaliacao" => $this->getAvaliacao(),
            "qtdaula" => $this->getQtdAula(),
            "idaula" => $this->getIdAula()
        );
    }
}
