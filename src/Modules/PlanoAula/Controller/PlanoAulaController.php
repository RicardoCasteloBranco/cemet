<?php
namespace CasteloBranco\Cemet\Modules\PlanoAula\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
session_start();
/**
 * Description of PlanoAulaController
 *  
 * @author ricardo
 */
class PlanoAulaController implements IController{
    public function addAction() {
        $instrutor = \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                find(["idinstrutor" => filter_input(INPUT_GET,"idinstrutor")]);
        define("IDDISCIPLINA", $instrutor->getIdDisciplina());
        $aulas = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAula::class, $dados);
            \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::insert($classe);
            header("location:?module=PlanoAula&page=show.php&idinstrutor=".$instrutor->getIdInstrutor());
        }
        return array(
            "aulas" => $aulas, "instrutor" => $instrutor
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $planoAula = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::
                find(["idplano" => filter_input(INPUT_GET,"idplano")]);       
        
        $instrutor = \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                find(["idinstrutor" => $planoAula->getIdInstrutor()]);
        
        define("IDDISCIPLINA", $instrutor->getIdDisciplina());
        $aulas = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAula::class, $dados);
            \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::update($planoAula, $classe);
            header("location:?module=PlanoAula&page=show.php&idinstrutor=".$instrutor->getIdInstrutor());
        }
        return array(
            "planoaula" => $planoAula, "instrutor" => $instrutor, "aulas" => $aulas
        );
    }

    public function indexAction() {
        $pessoa = unserialize($_SESSION["pessoa"]);
        
        $disciplinas = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::
                showDisciplinas($pessoa->getIdPessoa());
        return array(
            "disciplinas" => $disciplinas
        );
    }
    
    public function showAction(){
        define("IDINSTRUTOR", filter_input(INPUT_GET, "idinstrutor"));
        $instrutor = \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                find(["idinstrutor" => filter_input(INPUT_GET,"idinstrutor")]);
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(["iddisciplina" => $instrutor->getIdDisciplina()]);
        
        $planos = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::findAll();        
        return array(
            "planos" => $planos, "disciplina" => $disciplina, "instrutor" => $instrutor
        );
    }
    
    public function printAction(){
        $plano = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::
                find(["idplano" => filter_input(INPUT_GET, "idplano")]);
        $inscricao = \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                find(["idinstrutor" => $plano->getIdInstrutor()]);
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(["iddisciplina" => $inscricao->getIdDisciplina()]);
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(["idturma" => $inscricao->getIdTurma()]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => $disciplina->getIdCurso()]);
        $aula = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::
                find(["idaula" => $plano->getIdAula()]);
        $instrutor = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::
                find(["idpessoa" => $inscricao->getIdPessoa()]);
        $idCoord = \CasteloBranco\Cemet\Modules\Coordenador\Model\CoordenadorTabela::
                find(["idturma" => $turma->getIdTurma()]);
        $coordenador = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::
                find(["idpessoa" => $idCoord->getIdPessoa()]);
        $instrutores = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::
                getInstrutores($turma->getIdTurma(), $disciplina->getIdDisciplina());
        $qtdAulas = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::
                contadorAula($inscricao->getIdInstrutor(), $plano->getData(),$plano->getTurno());
        return array(
            "plano" => $plano, "instrutor" => $instrutor, "disciplina" => $disciplina,
            "turma" => $turma, "curso" => $curso,"aula" => $aula,"instrutor" => $instrutor,
            "coordenador" => $coordenador,"instrutores" => $instrutores,"qtdAulas" => $qtdAulas
        );
    }

}
