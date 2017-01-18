<?php
namespace CasteloBranco\Cemet\Modules\Campus\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Campus
 *
 * @author antonio
 */
class Campus extends Product{
    private $idCampus;
    private $nomeCampus;
    private $siglaCampus;
    private $idOrgao;
    
    public function __construct(array $dados) {
        $this->setIdCampus(isset($dados["idcampus"])?$dados["idcampus"]:0)
             ->setIdOrgao($dados["idorgao"])
             ->setNomeCampus($dados["nome_campus"])
             ->setSiglaCampus($dados["sigla_campus"]);
    }
    
    public function getIdCampus() {
        return $this->idCampus;
    }

    public function getNomeCampus() {
        return $this->nomeCampus;
    }

    public function getSiglaCampus() {
        return $this->siglaCampus;
    }

    public function getIdOrgao() {
        return $this->idOrgao;
    }

    public function setIdCampus($idCampus) {
        $this->idCampus = $idCampus;
        return $this;
    }

    public function setNomeCampus($nomeCampus) {
        $this->nomeCampus = $nomeCampus;
        return $this;
    }

    public function setSiglaCampus($siglaCampus) {
        $this->siglaCampus = $siglaCampus;
        return $this;
    }

    public function setIdOrgao($idOrgao) {
        $this->idOrgao = $idOrgao;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idcampus" => \PDO::PARAM_INT,
            "idorgao" => \PDO::PARAM_INT,
            "nome_campus" => \PDO::PARAM_STR,
            "sigla_campus" => \PDO::PARAM_STR,
        );
    }

    public function getValues() {
        return array(
            "idcampus" => $this->getIdCampus(),
            "idorgao" => $this->getIdOrgao(),
            "nome_campus" => $this->getNomeCampus(),
            "sigla_campus" => $this->getSiglaCampus(),
        );
    }

}
