<?php
namespace CasteloBranco\Cemet\Modules\Avaliacao\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of AvaliacaoInstrutores
 *
 * @author Ricardo
 */
class AvaliacaoInstrutores extends Product{
    private $idAvaliacao;
    private $idInstrutor;
    private $relacionamento;
    private $dominio;
    private $clareza;
    private $recursos;
    private $organizacao;
    private $metodologia;
    private $responsabilidade;
    private $avaliacao;
    private $observacao;
    private $idAluno;
    
    public function __construct(array $dados) {
        $this->setIdAvaliacao(isset($dados["idavaliacao"])?$dados["idavaliacao"]:0)
             ->setAvaliacao($dados["avaliacao"])
             ->setClareza($dados["clareza"])
             ->setDominio($dados["dominio"])
             ->setIdAluno($dados["idaluno"])
             ->setIdInstrutor($dados["idinstrutor"])
             ->setMetodologia($dados["metodologia"])
             ->setObservacao($dados["observacao"])
             ->setOrganizacao($dados["organizacao"])
             ->setRecursos($dados["recursos"])
             ->setRelacionamento($dados["relacionamento"])
             ->setResponsabilidade($dados["resposabilidade"]);
    }

    public function getIdAvaliacao() {
        return $this->idAvaliacao;
    }

    public function getIdInstrutor() {
        return $this->idInstrutor;
    }

    public function getRelacionamento() {
        return $this->relacionamento;
    }

    public function getDominio() {
        return $this->dominio;
    }

    public function getClareza() {
        return $this->clareza;
    }

    public function getRecursos() {
        return $this->recursos;
    }

    public function getOrganizacao() {
        return $this->organizacao;
    }

    public function getMetodologia() {
        return $this->metodologia;
    }

    public function getResponsabilidade() {
        return $this->responsabilidade;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function getIdAluno() {
        return $this->idAluno;
    }

    public function setIdAvaliacao($idAvaliacao) {
        $this->idAvaliacao = $idAvaliacao;
        return $this;
    }

    public function setIdInstrutor($idInstrutor) {
        $this->idInstrutor = $idInstrutor;
        return $this;
    }

    public function setRelacionamento($relacionamento) {
        $this->relacionamento = $relacionamento;
        return $this;
    }

    public function setDominio($dominio) {
        $this->dominio = $dominio;
        return $this;
    }

    public function setClareza($clareza) {
        $this->clareza = $clareza;
        return $this;
    }

    public function setRecursos($recursos) {
        $this->recursos = $recursos;
        return $this;
    }

    public function setOrganizacao($organizacao) {
        $this->organizacao = $organizacao;
        return $this;
    }

    public function setMetodologia($metodologia) {
        $this->metodologia = $metodologia;
        return $this;
    }

    public function setResponsabilidade($responsabilidade) {
        $this->responsabilidade = $responsabilidade;
        return $this;
    }

    public function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
        return $this;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
        return $this;
    }

    public function getParams() {
        return array(
            "idavaliacao" => \PDO::PARAM_INT,
            "idinstrutor" => \PDO::PARAM_INT,
            "relacionamento" => \PDO::PARAM_INT,
            "dominio" => \PDO::PARAM_INT,
            "clareza" => \PDO::PARAM_INT,
            "recursos" => \PDO::PARAM_INT,
            "organizacao" => \PDO::PARAM_INT,
            "metodologia" => \PDO::PARAM_INT,
            "responsabilidade" => \PDO::PARAM_INT,
            "avaliacao" => \PDO::PARAM_INT,
            "observacao" => \PDO::PARAM_STR,
            "idaluno" => \PDO::PARAM_INT
        );
    }

    public function getValues() {
        return array(
            "idavaliacao" =>$this->getIdAvaliacao(),
            "idinstrutor" => $this->getIdInstrutor(),
            "relacionamento" => $this->getRelacionamento(),
            "dominio" => $this->getDominio(),
            "clareza" => $this->getClareza(),
            "recursos" => $this->getRecursos(),
            "organizacao" => $this->getOrganizacao(),
            "metodologia" => $this->getMetodologia(),
            "responsabilidade" => $this->getResponsabilidade(),
            "avaliacao" => $this->getAvaliacao(),
            "observacao" => $this->getObservacao(),
            "idaluno" => $this->getIdAluno()
        );
    }
}
