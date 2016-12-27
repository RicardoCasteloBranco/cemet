<?php
namespace CasteloBranco\Cemet\Modules\Cargo\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Cargo
 *
 * @author ricardo
 */
class Cargo extends Product{
    private $idCargo;
    private $cargo;
    private $abreviatura;
    private $idOrgao;
    
    public function __construct(array $dados) {
        $this->setIdCargo(isset($dados["idcargo"])?$dados["idcargo"]:0)
             ->setAbreviatura($dados["abreviatura"])
             ->setCargo($dados["cargo"])
             ->setIdOrgao($dados["idorgao"]);
    }
    
    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getAbreviatura() {
        return $this->abreviatura;
    }

    public function getIdOrgao() {
        return $this->idOrgao;
    }

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
        return $this;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
        return $this;
    }

    public function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
        return $this;
    }

    public function setIdOrgao($idOrgao) {
        $this->idOrgao = $idOrgao;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idcargo" => \PDO::PARAM_INT,
            "cargo" => \PDO::PARAM_STR,
            "abreviatura" => \PDO::PARAM_STR,
            "idorgao" => \PDO::PARAM_INT
        );
    }

    public function getValues() {
        return array(
            "idcargo" => $this->getIdCargo(),
            "cargo" => $this->getCargo(),
            "abreviatura" => $this->getAbreviatura(),
            "idorgao" => $this->getIdOrgao()
        );
    }

}
