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
    private $idCampus;
    private $siglaCurso;
    private $nomeCurso;
    private $publicoAlvo;
    
    function __construct(array $dados) {
        $this->setIdCurso(isset($dados["idcurso"])?$dados["idcurso"]:0)
             ->setIdCampus($dados["idcampus"])
             ->setNomeCurso($dados["nomecurso"])
             ->setSiglaCurso($dados["siglacurso"])
             ->setPublicoAlvo($dados["publicoalvo"]);
    }
    
    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getIdCampus() {
        return $this->idCampus;
    }

    public function getSiglaCurso() {
        return $this->siglaCurso;
    }

    public function getNomeCurso() {
        return $this->nomeCurso;
    }
    
    public function getPublicoAlvo() {
        return $this->publicoAlvo;
    }
    
    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function setIdCampus($idCampus) {
        $this->idCampus = $idCampus;
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
    
    public function setPublicoAlvo($publicoAlvo) {
        $this->publicoAlvo = $publicoAlvo;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idcurso" => \PDO::PARAM_INT,
            "idcampus" => \PDO::PARAM_INT,
            "siglacurso" => \PDO::PARAM_STR,
            "nomecurso" => \PDO::PARAM_STR,
            "publicoalvo" => \PDO::PARAM_STR,
        );
    }

    public function getValues() {
        return array(
            "idcurso" => $this->getIdCurso(),
            "idcampus" => $this->getIdCampus(),
            "siglacurso" => $this->getSiglaCurso(),
            "nomecurso" => $this->getNomeCurso(),
            "publicoalvo" => $this->getPublicoAlvo(),
        );
    }

}
