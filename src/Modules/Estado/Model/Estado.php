<?php
namespace CasteloBranco\Cemet\Modules\Estado\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Estado
 *
 * @author antonio
 */
class Estado extends Product{
       private $idEstado;
       private $uf;
       private $nome;
       
       public function __construct(array $dados) {
           $this->setIdEstado(isset($dados["idestado"])?$dados["idestado"]:0)
                ->setNome($dados["nome"])
                ->setUf($dados["uf"]);
       }
       
       public function getIdEstado() {
           return $this->idEstado;
       }

       public function getUf() {
           return $this->uf;
       }

       public function getNome() {
           return $this->nome;
       }

       public function setIdEstado($idEstado) {
           $this->idEstado = $idEstado;
           return $this;
       }

       public function setUf($uf) {
           $this->uf = $uf;
           return $this;
       }

       public function setNome($nome) {
           $this->nome = $nome;
           return $this;
       }

       public function getParams() {
           return array(
               "idestado" => \PDO::PARAM_INT,
               "uf" => \PDO::PARAM_STR,
               "nome" => \PDO::PARAM_STR
           );
       }

       public function getValues() {
           return array(
               "idestado" => $this->getIdEstado(),
               "uf" => $this->getUf(),
               "nome" => $this->getNome()
           );
       }
}
