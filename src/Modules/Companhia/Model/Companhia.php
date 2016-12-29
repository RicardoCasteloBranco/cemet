<?php
namespace CasteloBranco\Cemet\Modules\Companhia\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Companhia
 *
 * @author Ricardo
 */
class Companhia extends Product{
    private $idCompanhia;
    private $local;
    private $companhia;
    private $curso;
    
    public function __construct(array $dados) {
        $this->setIdCompanhia(isset($dados["idcompanhia"])?$dados["idcompanhia"]:0)
             ->setCompanhia($dados["companhia"])
             ->setCurso($dados["curso"])
             ->setLocal($dados["local"]);
    }
    
    public function getIdCompanhia() {
        return $this->idCompanhia;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getCompanhia() {
        return $this->companhia;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setIdCompanhia($idCompanhia) {
        $this->idCompanhia = $idCompanhia;
        return $this;
    }

    public function setLocal($local) {
        $this->local = $local;
        return $this;
    }

    public function setCompanhia($companhia) {
        $this->companhia = $companhia;
        return $this;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idcompanhia" => \PDO::PARAM_INT,
            "companhia" => \PDO::PARAM_STR,
            "local" => \PDO::PARAM_STR,
            "curso" => \PDO::PARAM_INT
        );
    }

    public function getValues() {
        return array(
            "idcompanhia" => $this->getIdCompanhia(),
            "companhia" => $this->getCompanhia(),
            "local" => $this->getLocal(),
            "curso" => $this->getCurso()
        );
    }
}
