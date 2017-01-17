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
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Disciplina\Model\Disciplina::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                    insert($classe);
            header("location:?module=Disciplina&page=show.php&idcurso=". filter_input(INPUT_POST, "idcurso"));
        }
        return array(
            "cursos" => $cursos
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(["iddisciplina" => filter_input(INPUT_GET, "iddisciplina")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Disciplina\Model\Disciplina::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                    update($disciplina, $classe);
            header("location:?module=Disciplina&page=show.php&idcurso=". filter_input(INPUT_POST, "idcurso"));
        }
        return array(
            "disciplina" => $disciplina,
        );
    }

    public function indexAction() {
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => filter_input(INPUT_GET, "idcurso")]);
        define("IDCURSO", filter_input(INPUT_GET, "idcurso"));
        $disciplinas = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                findAll();
        return array(
            "disciplinas" => $disciplinas,
            "curso" => $curso
        );
    }
    
    public function printAction(){
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(["iddisciplina" => filter_input(INPUT_GET, "iddisciplina")]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => $disciplina->getIdCurso()]);
        define("IDDISCIPLINA", $disciplina->getIdDisciplina());
        $aulas = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::findAll();
        return array(
            "disciplina" => $disciplina, "curso" => $curso, "aulas" => $aulas
        );
    }
}
