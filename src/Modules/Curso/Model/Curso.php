<?php
namespace CasteloBranco\Cemet\Modules\Curso\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Curso
 *
 * @author ricardo
 */
class Curso extends Product{
    private $idCurso;
    private $idOrgao;
    private $siglaCurso;
    private $nomeCurso;
    
    function __construct(array $dados) {
        $this->setIdCurso(isset($dados["idcurso"])?$dados["idcurso"]:0)
             ->setIdOrgao($dados["idorgao"])
             ->setNomeCurso($dados["nomecurso"])
             ->setSiglaCurso($dados["siglacurso"]);
    }
    
    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getIdOrgao() {
        return $this->idOrgao;
    }

    public function getSiglaCurso() {
        return $this->siglaCurso;
    }

    public function getNomeCurso() {
        return $this->nomeCurso;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function setIdOrgao($idOrgao) {
        $this->idOrgao = $idOrgao;
        return $this;
    }

    public function setSiglaCurso($siglaCurso) {
        $this->siglaCurso = $siglaCurso;
        return $this;
    }

    public function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idcurso" => \PDO::PARAM_INT,
            "idorgao" => \PDO::PARAM_INT,
            "siglacurso" => \PDO::PARAM_STR,
            "nomecurso" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idcurso" => $this->getIdCurso(),
            "idorgao" => $this->getIdOrgao(),
            "siglacurso" => $this->getSiglaCurso(),
            "nomecurso" => $this->getNomeCurso()
        );
    }

}
