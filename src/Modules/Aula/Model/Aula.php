<?php
namespace CasteloBranco\Cemet\Modules\Aula\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Aula
 *
 * @author ricardo
 */
class Aula extends Product{
    private $idAula;
    private $idDisciplina;
    private $objetivo;
    private $qtdAulas;
    private $instrutorSecundario;
    private $conteudo;
    private $eixo;
    private $relacao;
    
    public function __construct(array $dados) {
        $this->setIdAula(isset($dados["idaula"])?$dados["idaula"]:0)
             ->setConteudo($dados["conteudo"])
             ->setEixo($dados["eixo"])
             ->setIdDisciplina($dados["iddisciplina"])
             ->setInstrutorSecundario($dados["instrutor_secundario"])
             ->setObjetivo($dados["objetivo"])
             ->setQtdAulas($dados["qtd_aulas"])
             ->setRelacao($dados["relacao"]);
    }
    
    public function getIdAula() {
        return $this->idAula;
    }

    public function getIdDisciplina() {
        return $this->idDisciplina;
    }

    public function getObjetivo() {
        return $this->objetivo;
    }

    public function getQtdAulas() {
        return $this->qtdAulas;
    }

    public function getInstrutorSecundario() {
        return $this->instrutorSecundario;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function getEixo() {
        return $this->eixo;
    }

    public function getRelacao() {
        return $this->relacao;
    }

    public function setIdAula($idAula) {
        $this->idAula = $idAula;
        return $this;
    }

    public function setIdDisciplina($idDisciplina) {
        $this->idDisciplina = $idDisciplina;
        return $this;
    }

    public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
        return $this;
    }

    public function setQtdAulas($qtdAulas) {
        $this->qtdAulas = $qtdAulas;
        return $this;
    }

    public function setInstrutorSecundario($instrutorSecundario) {
        $this->instrutorSecundario = $instrutorSecundario;
        return $this;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
        return $this;
    }

    public function setEixo($eixo) {
        $this->eixo = $eixo;
        return $this;
    }

    public function setRelacao($relacao) {
        $this->relacao = $relacao;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idaula" => \PDO::PARAM_INT,
            "iddisciplina" => \PDO::PARAM_INT,
            "objetivo" => \PDO::PARAM_STR,
            "qtd_aulas" => \PDO::PARAM_INT,
            "instrutor_secundario" => \PDO::PARAM_INT,
            "conteudo" => \PDO::PARAM_STR,
            "eixo" => \PDO::PARAM_STR,
            "relacao" => \PDO::PARAM_STR,
        );
    }

    public function getValues() {
        return array(
            "idaula" => $this->getIdAula(),
            "iddisciplina" => $this->getIdDisciplina(),
            "objetivo" => $this->getObjetivo(),
            "qtd_aulas" => $this->getQtdAulas(),
            "instrutor_secundario" => $this->getInstrutorSecundario(),
            "conteudo" => $this->getConteudo(),
            "eixo" => $this->getEixo(),
            "relacao" => $this->getRelacao(),
        );
    }

}
