<?php
namespace CasteloBranco\Cemet\Modules\Orgao\Model;
use CasteloBranco\Cemet\Factory\Product;

/**
 * Description of Orgao
 *
 * @author Ricardo
 */
class Orgao extends Product{
    private $idOrgao;
    private $orgao;
    private $sigla;
    
    public function __construct(array $dados) {
        $this->setIdOrgao(isset($dados["idorgao"])?$dados["idorgao"]:0)
             ->setOrgao($dados["orgao"])
             ->setSigla($dados["sigla"]);
    }
    
    public function getIdOrgao() {
        return $this->idOrgao;
    }

    public function getOrgao() {
        return $this->orgao;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function setIdOrgao($idOrgao) {
        $this->idOrgao = $idOrgao;
        return $this;
    }

    public function setOrgao($orgao) {
        $this->orgao = $orgao;
        return $this;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idorgao" => \PDO::PARAM_INT,
            "orgao" => \PDO::PARAM_STR,
            "sigla" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idorgao" => $this->getIdOrgao(),
            "orgao" => $this->getOrgao(),
            "sigla" => $this->getSigla()
        );
    }
}
