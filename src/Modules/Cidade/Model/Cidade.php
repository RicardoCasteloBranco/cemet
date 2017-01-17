<?php
namespace CasteloBranco\Cemet\Modules\Cidade\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Cidade
 *
 * @author antonio
 */
class Cidade extends Product{
    private $idCidade;
    private $estado;
    private $nome;
    
    public function __construct(array $dados) {
        $this->setIdCidade(isset($dados["idcidade"])?$dados["idcidade"]:0)
             ->setEstado($dados["estado"])
             ->setNome($dados["nome"]);
    }
    
    public function getIdCidade() {
        return $this->idCidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdCidade($idCidade) {
        $this->idCidade = $idCidade;
        return $this;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idcidade" => \PDO::PARAM_INT,
            "estado" => \PDO::PARAM_INT,
            "nome" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idcidade" => $this->getIdCidade(),
            "estado" => $this->getEstado(),
            "nome" => $this->getNome()
        );
    }
}
