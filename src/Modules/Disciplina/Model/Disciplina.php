<?php
namespace CasteloBranco\Cemet\Modules\Disciplina\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Disciplina
 *
 * @author ricardo
 */
class Disciplina extends Product{
    private $idDisciplina;
    private $idCurso;
    private $disciplina;
    private $sigla;
    private $cargaHoraria;
    private $ementa;
    private $conhecimento;
    private $habilidade;
    private $atitude;
    private $bibliografia;
    
    public function __construct(array $dados) {
        $this->setIdDisciplina(isset($dados["iddisciplina"])?$dados["iddisciplina"]:0)
             ->setAtitude($dados["atitude"])
             ->setBibliografia($dados["bibliografia"])
             ->setCargaHoraria($dados["cargahoraria"])
             ->setConhecimento($dados["conhecimento"])
             ->setDisciplina($dados["disciplina"])
             ->setEmenta($dados["ementa"])
             ->setHabilidade($dados["habilidade"])
             ->setIdCurso($dados["idcurso"])
             ->setSigla($dados["sigla"]);
    }
    
    public function getIdDisciplina() {
        return $this->idDisciplina;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getDisciplina() {
        return $this->disciplina;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    public function getEmenta() {
        return $this->ementa;
    }

    public function getConhecimento() {
        return $this->conhecimento;
    }

    public function getHabilidade() {
        return $this->habilidade;
    }

    public function getAtitude() {
        return $this->atitude;
    }

    public function getBibliografia() {
        return $this->bibliografia;
    }

    public function setIdDisciplina($idDisciplina) {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
        return $this;
    }

    public function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
        return $this;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
        return $this;
    }

    public function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
        return $this;
    }

    public function setEmenta($ementa) {
        $this->ementa = $ementa;
        return $this;
    }

    public function setConhecimento($conhecimento) {
        $this->conhecimento = $conhecimento;
        return $this;
    }

    public function setHabilidade($habilidade) {
        $this->habilidade = $habilidade;
        return $this;
    }

    public function setAtitude($atitude) {
        $this->atitude = $atitude;
        return $this;
    }

    public function setBibliografia($bibliografia) {
        $this->bibliografia = $bibliografia;
        return $this;
    }
    
    public function getParams() {
        return array(
            "iddisciplina" => \PDO::PARAM_INT,
            "idcurso" => \PDO::PARAM_INT,
            "disciplina" => \PDO::PARAM_STR,
            "sigla" => \PDO::PARAM_STR,
            "cargahoraria" => \PDO::PARAM_INT,
            "ementa" => \PDO::PARAM_STR,
            "conhecimento" => \PDO::PARAM_STR,
            "habilidade" => \PDO::PARAM_STR,
            "atitude" => \PDO::PARAM_STR,
            "bibliografia" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "iddisciplina" => $this->getIdDisciplina(),
            "idcurso" => $this->getIdCurso(),
            "disciplina" => $this->getDisciplina(),
            "sigla" => $this->getSigla(),
            "cargahoraria" => $this->getCargaHoraria(),
            "ementa" => $this->getEmenta(),
            "conhecimento" => $this->getConhecimento(),
            "habilidade" => $this->getHabilidade(),
            "atitude" => $this->getAtitude(),
            "bibliografia" => $this->getBibliografia()
        );
    }
}
