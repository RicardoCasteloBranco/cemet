<?php
namespace CasteloBranco\Cemet\Modules\Turma\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of TurmaController
 *
 * @author ricardo
 */
class TurmaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Turma\Model\Turma::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::insert($classe);
            header("location:?module=Turma&page=index.php&idcompanhia=".$classe->getCompanhia());
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(["idturma" => filter_input(INPUT_GET,"idturma")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Turma\Model\Turma::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::update($turma, $classe);
            header("location:?module=Turma&page=index.php&idcompanhia=".$classe->getCompanhia() );
        }
        return array(
            "turma" => $turma
        );
    }

    public function indexAction() {
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                find(["idcompanhia" => filter_input(INPUT_GET, "idcompanhia")]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => $companhia->getIdCurso()]);
        define("COMPANHIA", $companhia->getIdCompanhia());
        $turmas = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::findAll();
        return array(
            "turmas" => $turmas,
            "companhia" => $companhia,
            "curso" => $curso
        );
    }

}
