<?php
namespace CasteloBranco\Cemet\Modules\Pessoa\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Pessoa
 *
 * @author ricardo
 */
class Pessoa extends Product{
    private $idPessoa;
    private $idCargo;
    private $nome;
    private $cpf;
    private $senha;
    private $confirma;
    private $email;
    
    public function __construct(array $dados) {
        $this->setIdPessoa(isset($dados["idpessoa"])?$dados["idpessoa"]:0)
             ->setConfirma(isset($dados["confirma"])?$dados["confirma"]:0)
             ->setIdCargo($dados["idcargo"])
             ->setCpf($dados["cpf"])
             ->setEmail($dados["email"])
             ->setNome($dados["nome"])
             ->setSenha($dados["senha"]);
    }
    
    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function getIdCargo() {
        return $this->idCargo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getConfirma() {
        return $this->confirma;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    public function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setCpf($cpf) {
        $this->cpf = str_replace([".","-"],"",$cpf);
        return $this;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
        return $this;
    }

    public function setConfirma($confirma) {
        $this->confirma = (int)$confirma;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idpessoa" => \PDO::PARAM_INT,
            "idcargo" => \PDO::PARAM_INT,
            "nome" => \PDO::PARAM_STR,
            "cpf" => \PDO::PARAM_STR,
            "senha" => \PDO::PARAM_STR,
            "confirma" => \PDO::PARAM_INT,
            "email" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idpessoa" => $this->getIdPessoa(),
            "idcargo" => $this->getIdCargo(),
            "nome" => $this->getNome(),
            "cpf" => $this->getCpf(),
            "senha" => $this->getSenha(),
            "confirma" => $this->getConfirma(),
            "email" => $this->getEmail()
        );
    }
}
