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
    private $sala;
    
    
    public function __construct(array $dados) {
        $this->setIdTurma(isset($dados["idturma"])?$dados["idturma"]:0)
             ->setCompanhia($dados["companhia"])
             ->setTurma($dados["turma"])
             ->setSala($dados["sala"]);
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
    
    public function getSala() {
        return $this->sala;
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
    
    public function setSala($sala) {
        $this->sala = $sala;
        return $this;
    }

     
    public function getParams() {
        return array(
            "idturma" => \PDO::PARAM_INT,
            "companhia" => \PDO::PARAM_INT,
            "turma" => \PDO::PARAM_STR,
            "sala" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idturma" => $this->getIdTurma(),
            "companhia" => $this->getCompanhia(),
            "turma" => $this->getTurma(),
            "sala" => $this->getSala()
        );
    }
}
