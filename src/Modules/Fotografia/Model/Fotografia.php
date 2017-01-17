<?php
namespace CasteloBranco\Cemet\Modules\Fotografia\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Fotografia
 *
 * @author antonio
 */
class Fotografia extends Product{
    private $idFotografia;
    private $content;
    private $type;
    private $idAluno;
    
    public function __construct(array $dados) {
        $this->setIdFotografia(isset($dados["idfotografia"])?$dados["idfotografia"]:0)
             ->setContent(isset($dados["content"])?$dados["content"]:NULL)
             ->setType(isset($dados["type"])?$dados["type"]:NULL)
             ->setIdAluno($dados["idaluno"]);
    }
    
    public function getIdFotografia() {
        return $this->idFotografia;
    }

    public function getContent() {
        return $this->content;
    }

    public function getIdAluno() {
        return $this->idAluno;
    }
    
    public function getType() {
        return $this->type;
    }

    public function setIdFotografia($idFotografia) {
        $this->idFotografia = $idFotografia;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
        return $this;
    }
    
    public function setType($type) {
        $this->type = $type;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idfotografia" => \PDO::PARAM_INT,
            "content" => \PDO::PARAM_LOB,
            "idaluno" => \PDO::PARAM_INT,
            "type" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idfotografia" => $this->getIdFotografia(),
            "content" => $this->getContent(),
            "idaluno" => $this->getIdAluno(),
            "type" => $this->getType()
        );
    }

}
