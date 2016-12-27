<?php
namespace CasteloBranco\Cemet\Modules\Disciplina\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of DisciplinaController
 *
 * @author ricardo
 */
class DisciplinaController implements IController{
    public function addAction() {
        $cursos = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::findAll();
        if(filter_input(INPUT_POST, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Disciplina\Model\Disciplina::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                    insert($classe);
                    header();
        }
        return array(
            "cursos" => $cursos
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(filter_input(INPUT_GET, "iddisciplina"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Disciplina\Model\Disciplina::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                    update($disciplina, $classe);
            header();
        }
        return array(
            "disciplina" => $disciplina,
        );
    }

    public function indexAction() {
        $disciplinas = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                findAll();
        return array(
            "disciplinas" => $disciplinas
        );
    }

}
