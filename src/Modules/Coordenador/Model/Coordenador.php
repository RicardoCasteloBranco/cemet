<?php
namespace CasteloBranco\Cemet\Modules\Coordenador\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Coordenador
 *
 * @author ricardo
 */
class Coordenador extends Product{
    private $idTurma;
    private $idPessoa;
    private $idCoordenador;
    
    public function __construct(array $dados) {
        $this->setIdCoordenador(isset($dados["idcoordenador"])?$dados["idcoordenador"]:0)
             ->setIdTurma($dados["idturma"])
             ->setIdPessoa($dados["idpessoa"]);
    }
    
    public function getIdTurma() {
        return $this->idTurma;
    }

    public function getIdCoordenador() {
        return $this->idCoordenador;
    }
    
    public function getIdPessoa() {
        return $this->idPessoa;
    }

        
    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
        return $this;
    }
    
    public function setIdCoordenador($idCoordenador) {
        $this->idCoordenador = $idCoordenador;
        return $this;
    }

    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    
    public function getParams() {
        return array(
            "idpessoa" => \PDO::PARAM_INT,
            "idturma" => \PDO::PARAM_INT,
            "idcoordenador" => \PDO::PARAM_INT
        );
    }

    public function getValues() {
        return array(
            "idpessoa" => $this->getIdPessoa(),
            "idturma" => $this->getIdTurma(),
            "idcoordenador" => $this->getIdCoordenador(),
        );
    }

}
