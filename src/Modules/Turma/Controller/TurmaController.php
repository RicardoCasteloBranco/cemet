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
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(filter_input(INPUT_GET,"idturma"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Turma\Model\Turma::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::update($turma, $classe);
            header();
        }
        return array(
            "turma" => $turma
        );
    }

    public function indexAction() {
        $turmas = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::findAll();
        return array(
            "turmas" => $turmas
        );
    }

}
