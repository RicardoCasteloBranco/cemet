<?php
namespace CasteloBranco\Cemet\Modules\Cidade\Controller;
use CasteloBranco\Cemet\Interfaces\IController;

/**
 * Description of CidadeController
 *
 * @author antonio
 */
class CidadeController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Cidade\Model\Cidade::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Cidade\Model\CidadeTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $id = filter_input(INPUT_GET, "idcidade");
        $cidade = \CasteloBranco\Cemet\Modules\Cidade\Model\CidadeTabela::find($id);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Cidade\Model\Cidade::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Cidade\Model\CidadeTabela::update($cidade, $classe);
            header();
        }
        return array(
            "cidade" => $cidade
        );
    }

    public function indexAction() {
        define("IDESTADO", filter_input(INPUT_GET, "idestado"));
        $cidades = \CasteloBranco\Cemet\Modules\Cidade\Model\CidadeTabela::findAll();
        return array(
            "cidades" => $cidades
        );
    }

}
