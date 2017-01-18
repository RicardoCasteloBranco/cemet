<?php
namespace CasteloBranco\Cemet\Modules\Curso\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of CursoController
 *
 * @author ricardo
 */
class CursoController implements IController{
    public function addAction() {
        $campus = \CasteloBranco\Cemet\Modules\Campus\Model\CampusTabela::findAll();
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Curso\Model\Curso::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::insert($classe);
            header("location:?module=Curso&page=index.php");
        }
        return array(
            "campus" => $campus
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => filter_input(INPUT_GET, "idcurso")]);
        $campus = \CasteloBranco\Cemet\Modules\Campus\Model\CampusTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Curso\Model\Curso::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::update($curso, $classe);
            header("location:?module=Curso&page=index.php");
        }
        return array(
            "curso" => $curso,
            "campus" => $campus
        );
    }

    public function indexAction() {
        $cursos = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::findAll();
        return array(
            "cursos" => $cursos
        );
    }

}
