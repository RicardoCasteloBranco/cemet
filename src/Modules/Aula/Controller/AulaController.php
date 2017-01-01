<?php
namespace CasteloBranco\Cemet\Modules\Aula\Controller;
use CasteloBranco\Cemet\Interfaces\IController;

/**
 * Description of AulaController
 *
 * @author ricardo
 */
class AulaController implements IController{
    public function addAction() {
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
        find(["iddisciplina" => filter_input(INPUT_GET, "iddisciplina")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Aula\Model\Aula::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::insert($classe);
            header("location:?module=Aula&page=index.php&iddisciplina=".$classe->getIdDisciplina());
        }
        return array(
            "disciplina" => $disciplina
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $aula = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::
                find(["idaula" => filter_input(INPUT_GET, "idaula")]);
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
        find(["iddisciplina" => $aula->getIdDisciplina()]);
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Aula\Model\Aula::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::update($aula, $classe);
            header("location:?module=Aula&page=index.php&iddisciplina=".$classe->getIdDisciplina());
        }
        return array(
            "aula" => $aula,
            "disciplina" => $disciplina
        );
    }

    public function indexAction() {
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(["iddisciplina" => filter_input(INPUT_GET, "iddisciplina")]);
        define("IDDISCIPLINA",$disciplina->getIdDisciplina());
        $aulas = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::findAll();
        return array(
            "aulas" => $aulas,
            "disciplina" => $disciplina
        );
    }

}
