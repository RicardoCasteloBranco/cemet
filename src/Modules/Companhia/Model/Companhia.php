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
    private $idcurso;
    private $dataInicio;
    private $dataTermino;
    private $comandante;
    
    public function __construct(array $dados) {
        $this->setIdCompanhia(isset($dados["idcompanhia"])?$dados["idcompanhia"]:0)
             ->setCompanhia($dados["companhia"])
             ->setIdCurso($dados["idcurso"])
             ->setLocal($dados["local"])
             ->setDataInicio($dados["data_inicio"])
             ->setDataTermino($dados["data_termino"])
             ->setComandante($dados["comandante"]);
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

    public function getIdcurso() {
        return $this->idcurso;
    }
    
    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataTermino() {
        return $this->dataTermino;
    }
    
    public function getComandante() {
        return $this->comandante;
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

    public function setIdcurso($idcurso) {
        $this->idcurso = $idcurso;
        return $this;
    }

    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    public function setDataTermino($dataTermino) {
        $this->dataTermino = $dataTermino;
        return $this;
    }
    
    public function setComandante($comandante) {
        $this->comandante = $comandante;
        return $this;
    }
            
    public function getParams() {
        return array(
            "idcompanhia" => \PDO::PARAM_INT,
            "companhia" => \PDO::PARAM_STR,
            "local" => \PDO::PARAM_STR,
            "idcurso" => \PDO::PARAM_INT,
            "data_inicio" => \PDO::PARAM_STR,
            "data_termino" => \PDO::PARAM_STR,
            "comandante" => \PDO::PARAM_INT,
        );
    }

    public function getValues() {
        return array(
            "idcompanhia" => $this->getIdCompanhia(),
            "companhia" => $this->getCompanhia(),
            "local" => $this->getLocal(),
            "idcurso" => $this->getIdCurso(),
            "data_inicio" => $this->getDataInicio(),
            "data_termino" => $this->getDataTermino(),
            "comandante" => $this->getComandante(),
        );
    }
}
