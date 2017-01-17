<?php
namespace CasteloBranco\Cemet\Modules\Estado\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of EstadoController
 *
 * @author antonio
 */
class EstadoController implements IController{
    public function addAction() {
        if(fiter_input(INPUT_SERVER,"REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Estado\Model\Estado::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Estado\Model\EstadoTabela::insert($classe);
            header("location:?modules=Estado&page=index.php");
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $estado = \CasteloBranco\Cemet\Modules\Estado\Model\EstadoTabela::
                find(filter_input(INPUT_GET, "idestado"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Estado\Model\Estado::class, $dados);
            \CasteloBranco\Cemet\Modules\Estado\Model\EstadoTabela::update($estado, $classe);
            header("location:?modules=Estado&page=index.php");
        }
        return array(
            "estado" => $estado
        );
    }

    public function indexAction() {
        $estados = \CasteloBranco\Cemet\Modules\Estado\Model\EstadoTabela::findAll();
        return array(
            "estados" => $estados
        );
    }
}
