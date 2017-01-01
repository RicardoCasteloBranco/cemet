<?php
namespace CasteloBranco\Cemet\Modules\Companhia\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of CompanhiaController
 *
 * @author Ricardo
 */
class CompanhiaController implements IController{
    public function addAction() {
        $cursos = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Companhia\Model\Companhia::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::insert($classe);
            header("location:?module=Companhia&page=show.php&idcurso=".$classe->getIdCurso());
        }
        return array(
            "cursos" => $cursos
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                find(["idcompanhia" => filter_input(INPUT_GET, "idcompanhia")]);
        $cursos = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::findAll();
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Companhia\Model\Companhia::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::update($companhia, $classe);
            header("location:?module=Companhia&page=show.php&idcurso=".$classe->getIdCurso());
        }
        return array(
            "companhia" => $companhia,
            "cursos" => $cursos
        );
    }

    public function indexAction() {
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => filter_input(INPUT_GET, "idcurso")]);
        define("IDCURSO", $curso->getIdCurso());
        $companhias = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                findAll();
        return array(
            "companhias" => $companhias,
            "curso" => $curso
        );
    }
   
}
