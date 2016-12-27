<?php
namespace CasteloBranco\Cemet\Modules\Nota\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of NotaController
 *
 * @author Ricardo
 */
class NotaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Nota\Model\Nota::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Nota\Model\NotaTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $nota = \CasteloBranco\Cemet\Modules\Nota\Model\NotaTabela::
                find(filter_input(INPUT_GET, "idnota"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Nota\Model\Nota::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Nota\Model\NotaTabela::update($nota, $classe);
            header();
        }
    }

    public function indexAction() {
        $notas = \CasteloBranco\Cemet\Modules\Nota\Model\NotaTabela::findAll();
        return array(
            "notas" => $notas
        );
    }
}
