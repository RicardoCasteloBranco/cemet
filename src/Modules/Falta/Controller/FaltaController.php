<?php
namespace CasteloBranco\Cemet\Modules\Falta\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of FaltaController
 *
 * @author ricardo
 */
class FaltaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Falta\Model\Falta::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Falta\Model\FaltaTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $falta = \CasteloBranco\Cemet\Modules\Falta\Model\FaltaTabela::
                find(filter_input(INPUT_GET, "idfalta"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Falta\Model\Falta::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Falta\Model\FaltaTabela::
                    update($falta, $classe);
        }
        return array(
            "falta" => $falta
        );
    }

    public function indexAction() {
        $faltas = \CasteloBranco\Cemet\Modules\Falta\Model\FaltaTabela::findAll();
        return array(
            "faltas" => $faltas
        );
    }

}
