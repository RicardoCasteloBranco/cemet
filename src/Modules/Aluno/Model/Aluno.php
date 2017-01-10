<?php
namespace CasteloBranco\Cemet\Modules\Aluno\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Aluno
 *
 * @author antonio
 */
class Aluno extends Product{
    private $idAluno;
    private $idPessoa;
    private $idTurma;
    private $dataPraca;
    private $dataNasc;
    private $nomeBanco;
    private $agencia;
    private $contaCorrente;
    private $numEfisco;
    private $rua;
    private $bairro;
    private $cidade;
    private $pontoReferencia;
    private $estadoCivil;
    private $pai;
    private $mae;
    private $religiao;
    private $genero;
    private $identidadeCivil;
    private $orgaoExpedidorIdCivil;
    private $categoria;
    private $renach;
    private $validadeHabilitacao;
    private $rgMilitar;
    private $camisa;
    private $calca;
    private $calcado;
    private $cobertura;
    private $grauDeInstrucao;
    private $cursoFormacao;
    private $qtdDependentes;
    private $celular;
    private $telefone;
    private $matricula;
    private $nomeGuerra;
    private $telefoneContato;
    private $numeroAluno;
    private $situacao;
    private $desligamento;
    private $motivoDesligamento;
    
    public function __construct(array $dados) {
        $this->setIdAluno(isset($dados["idaluno"])?$dados["idaluno"]:0)
             ->setAgencia($dados["agencia"])
             ->setBairro($dados["bairro"])
             ->setCalca($dados["calca"])
             ->setCalcado($dados["calcado"])
             ->setCamisa($dados["camisa"])
             ->setCategoria($dados["categoria"])
             ->setCelular($dados["celular"])
             ->setCidade($dados["cidade"])
             ->setCobertura($dados["cobertura"])
             ->setContaCorrente($dados["contacorrente"])
             ->setCursoFormacao($dados["curso_formacao"])
             ->setDataNasc($dados["datanasc"])
             ->setDataPraca($dados["datapraca"])
             ->setDesligamento(isset($dados["desligamento"])?$dados["desligamento"]:NULL)
             ->setEstadoCivil($dados["estadocivil"])
             ->setGenero($dados["genero"])
             ->setGrauDeInstrucao($dados["graudeinstrucao"])
             ->setIdPessoa($dados["idpessoa"])
             ->setIdTurma(isset($dados["idturma"])?$dados["idturma"]:0)
             ->setIdentidadeCivil($dados["identidadecivil"])
             ->setMae($dados["mae"])
             ->setMatricula($dados["matricula"])
             ->setMotivoDesligamento(isset($dados["motivodesligamento"])?$dados["motivodesligamento"]:NULL)
             ->setNomeBanco($dados["nomebanco"])
             ->setNomeGuerra(isset($dados["nomeguerra"])?$dados["nomeguerra"]:NULL)
             ->setNumEfisco(isset($dados["numefisco"])?$dados["numefisco"]:0)
             ->setNumeroAluno(isset($dados["numeroaluno"])?$dados["numeroaluno"]:0)
             ->setOrgaoExpedidorIdCivil($dados["orgaoexpedidoridcivil"])
             ->setPai($dados["pai"])
             ->setPontoReferencia($dados["pontoreferencia"])
             ->setQtdDependentes($dados["qtddependentes"])
             ->setReligiao($dados["religiao"])
             ->setRenach($dados["renach"])
             ->setRgMilitar($dados["rgmilitar"])
             ->setRua($dados["rua"])
             ->setSituacao(isset($dados["situacao"])?$dados["situacao"]:NULL)
             ->setTelefone($dados["telefone"])
             ->setTelefoneContato($dados["telefonecontato"])
             ->setValidadeHabilitacao($dados["validadehabilitacao"]);
    }
    
    public function getIdAluno() {
        return $this->idAluno;
    }

    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function getIdTurma() {
        return $this->idTurma;
    }

    public function getDataPraca() {
        return $this->dataPraca;
    }

    public function getDataNasc() {
        return $this->dataNasc;
    }

    public function getNomeBanco() {
        return $this->nomeBanco;
    }

    public function getAgencia() {
        return $this->agencia;
    }

    public function getContaCorrente() {
        return $this->contaCorrente;
    }

    public function getNumEfisco() {
        return $this->numEfisco;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getPontoReferencia() {
        return $this->pontoReferencia;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function getPai() {
        return $this->pai;
    }

    public function getMae() {
        return $this->mae;
    }

    public function getReligiao() {
        return $this->religiao;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getIdentidadeCivil() {
        return $this->identidadeCivil;
    }

    public function getOrgaoExpedidorIdCivil() {
        return $this->orgaoExpedidorIdCivil;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getRenach() {
        return $this->renach;
    }

    public function getValidadeHabilitacao() {
        return $this->validadeHabilitacao;
    }

    public function getRgMilitar() {
        return $this->rgMilitar;
    }

    public function getCamisa() {
        return $this->camisa;
    }

    public function getCalca() {
        return $this->calca;
    }

    public function getCalcado() {
        return $this->calcado;
    }

    public function getCobertura() {
        return $this->cobertura;
    }

    public function getGrauDeInstrucao() {
        return $this->grauDeInstrucao;
    }

    public function getCursoFormacao() {
        return $this->cursoFormacao;
    }

    public function getQtdDependentes() {
        return $this->qtdDependentes;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getNomeGuerra() {
        return $this->nomeGuerra;
    }

    public function getTelefoneContato() {
        return $this->telefoneContato;
    }

    public function getNumeroAluno() {
        return $this->numeroAluno;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getDesligamento() {
        return $this->desligamento;
    }

    public function getMotivoDesligamento() {
        return $this->motivoDesligamento;
    }

    public function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
        return $this;
    }

    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
        return $this;
    }

    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
        return $this;
    }

    public function setDataPraca($dataPraca) {
        $this->dataPraca = $dataPraca;
        return $this;
    }

    public function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
        return $this;
    }

    public function setNomeBanco($nomeBanco) {
        $this->nomeBanco = $nomeBanco;
        return $this;
    }

    public function setAgencia($agencia) {
        $this->agencia = $agencia;
        return $this;
    }

    public function setContaCorrente($contaCorrente) {
        $this->contaCorrente = $contaCorrente;
        return $this;
    }

    public function setNumEfisco($numEfisco) {
        $this->numEfisco = $numEfisco;
        return $this;
    }

    public function setRua($rua) {
        $this->rua = $rua;
        return $this;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
        return $this;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    public function setPontoReferencia($pontoReferencia) {
        $this->pontoReferencia = $pontoReferencia;
        return $this;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
        return $this;
    }

    public function setPai($pai) {
        $this->pai = $pai;
        return $this;
    }

    public function setMae($mae) {
        $this->mae = $mae;
        return $this;
    }

    public function setReligiao($religiao) {
        $this->religiao = $religiao;
        return $this;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
        return $this;
    }

    public function setIdentidadeCivil($identidadeCivil) {
        $this->identidadeCivil = $identidadeCivil;
        return $this;
    }

    public function setOrgaoExpedidorIdCivil($orgaoExpedidorIdCivil) {
        $this->orgaoExpedidorIdCivil = $orgaoExpedidorIdCivil;
        return $this;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
        return $this;
    }

    public function setRenach($renach) {
        $this->renach = $renach;
        return $this;
    }

    public function setValidadeHabilitacao($validadeHabilitacao) {
        $this->validadeHabilitacao = $validadeHabilitacao;
        return $this;
    }

    public function setRgMilitar($rgMilitar) {
        $this->rgMilitar = $rgMilitar;
        return $this;
    }

    public function setCamisa($camisa) {
        $this->camisa = $camisa;
        return $this;
    }

    public function setCalca($calca) {
        $this->calca = $calca;
        return $this;
    }

    public function setCalcado($calcado) {
        $this->calcado = $calcado;
        return $this;
    }

    public function setCobertura($cobertura) {
        $this->cobertura = $cobertura;
        return $this;
    }

    public function setGrauDeInstrucao($grauDeInstrucao) {
        $this->grauDeInstrucao = $grauDeInstrucao;
        return $this;
    }

    public function setCursoFormacao($cursoFormacao) {
        $this->cursoFormacao = $cursoFormacao;
        return $this;
    }

    public function setQtdDependentes($qtdDependentes) {
        $this->qtdDependentes = $qtdDependentes;
        return $this;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
        return $this;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
        return $this;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
        return $this;
    }

    public function setNomeGuerra($nomeGuerra) {
        $this->nomeGuerra = $nomeGuerra;
        return $this;
    }

    public function setTelefoneContato($telefoneContato) {
        $this->telefoneContato = $telefoneContato;
        return $this;
    }

    public function setNumeroAluno($numeroAluno) {
        $this->numeroAluno = $numeroAluno;
        return $this;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
        return $this;
    }

    public function setDesligamento($desligamento) {
        $this->desligamento = $desligamento;
        return $this;
    }

    public function setMotivoDesligamento($motivoDesligamento) {
        $this->motivoDesligamento = $motivoDesligamento;
        return $this;
    }
    
    public function getParams() {
        return array(
            "idaluno" => \PDO::PARAM_INT,
            "idpessoa" => \PDO::PARAM_INT,
            "idturma" => \PDO::PARAM_INT,
            "datapraca" => \PDO::PARAM_STR,
            "datanasc" => \PDO::PARAM_STR,
            "nomebanco" => \PDO::PARAM_STR,
            "agencia" => \PDO::PARAM_STR,
            "contacorrente" => \PDO::PARAM_STR,
            "numefisco" => \PDO::PARAM_INT,
            "rua" => \PDO::PARAM_STR,
            "bairro" => \PDO::PARAM_STR,
            "cidade" => \PDO::PARAM_INT,
            "estadocivil" => \PDO::PARAM_INT,
            "pai" => \PDO::PARAM_STR,
            "mae" => \PDO::PARAM_STR,
            "religiao" => \PDO::PARAM_INT,
            "genero" => \PDO::PARAM_INT,
            "identidadecivil" => \PDO::PARAM_STR,
            "orgaoexpedidoridcivil" => \PDO::PARAM_STR,
            "categoria" => \PDO::PARAM_STR,
            "renach" => \PDO::PARAM_STR,
            "validadehabilitacao" => \PDO::PARAM_STR,
            "rgmilitar" => \PDO::PARAM_STR,
            "camisa" => \PDO::PARAM_STR,
            "calca" => \PDO::PARAM_STR,
            "calcado" => \PDO::PARAM_STR,
            "cobertura" => \PDO::PARAM_STR,
            "graudeinstrucao" => \PDO::PARAM_INT,
            "curso_formacao" => \PDO::PARAM_INT,
            "qtddependentes" => \PDO::PARAM_INT,
            "celular" => \PDO::PARAM_STR,
            "telefone" => \PDO::PARAM_STR,
            "matricula" => \PDO::PARAM_STR,
            "nomeguerra" => \PDO::PARAM_STR,
            "telefonecontato" => \PDO::PARAM_STR,
            "pontoreferencia" => \PDO::PARAM_STR,
            "numeroaluno" => \PDO::PARAM_INT,
            "situacao" => \PDO::PARAM_STR,
            "desligamento" => \PDO::PARAM_STR,
            "motivodesligamento" => \PDO::PARAM_STR);
    }

    public function getValues() {
        return array(
            "idaluno" => $this->getIdAluno(),
            "idpessoa" => $this->getIdPessoa(),
            "idturma" => $this->getIdTurma(),
            "datapraca" => $this->getDataPraca(),
            "datanasc" => $this->getDataNasc(),
            "nomebanco" => $this->getNomeBanco(),
            "agencia" => $this->getAgencia(),
            "contacorrente" => $this->getContaCorrente(),
            "numefisco" => $this->getNumEfisco(),
            "rua" => $this->getRua(),
            "bairro" => $this->getBairro(),
            "cidade" => $this->getCidade(),
            "estadocivil" => $this->getEstadoCivil(),
            "pai" => $this->getPai(),
            "mae" => $this->getMae(),
            "religiao" => $this->getReligiao(),
            "genero" => $this->getGenero(),
            "identidadecivil" => $this->getIdentidadeCivil(),
            "orgaoexpedidoridcivil" => $this->getOrgaoExpedidorIdCivil(),
            "categoria" => $this->getCategoria(),
            "renach" => $this->getRenach(),
            "validadehabilitacao" => $this->getValidadeHabilitacao(),
            "rgmilitar" => $this->getRgMilitar(),
            "camisa" => $this->getCamisa(),
            "calca" => $this->getCalca(),
            "calcado" => $this->getCalcado(),
            "cobertura" => $this->getCobertura(),
            "graudeinstrucao" => $this->getGrauDeInstrucao(),
            "curso_formacao" => $this->getCursoFormacao(),
            "qtddependentes" => $this->getQtdDependentes(),
            "celular" => $this->getCelular(),
            "telefone" => $this->getTelefone(),
            "matricula" => $this->getMatricula(),
            "nomeguerra" => $this->getNomeGuerra(),
            "telefonecontato" => $this->getTelefoneContato(),
            "pontoreferencia" => $this->getPontoReferencia(),
            "numeroaluno" => $this->getNumeroAluno(),
            "situacao" => $this->getSituacao(),
            "desligamento" => $this->getDesligamento(),
            "motivodesligamento" => $this->getMotivoDesligamento());
    }
}
