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
            header("location=?module=PlanoAula&page=show.php&idinstrutor=".$instrutor->getIdInstrutor());
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
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAula::class, $dados);
            \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::update($planoAula, $classe);
            header();
        }
        return array(
            "planoaula" => $planoAula
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

}
