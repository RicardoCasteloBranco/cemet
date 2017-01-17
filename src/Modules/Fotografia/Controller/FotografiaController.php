<?php
namespace CasteloBranco\Cemet\Modules\Fotografia\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of FotografiaController
 *
 * @author antonio
 */
class FotografiaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Fotografia\Model\Fotografia::class,
                            $dados);
            $classe->setContent(file_get_contents($_FILES['fotografia']['tmp_name']));
            $classe->setType($_FILES['fotografia']['type']);
            \CasteloBranco\Cemet\Modules\Fotografia\Model\FotografiaTabela::insert($classe);
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $fotografia = \CasteloBranco\Cemet\Modules\Fotografia\Model\FotografiaTabela::
                find(["idfotografia" => filter_input(INPUT_GET, "idfotografia")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Fotografia\Model\Fotografia::class,
                            $dados);
            $classe->setContent(file_get_contents($_FILES['fotografia']['tmp_name']));
            $classe->setType($_FILES['fotografia']['type']);
            \CasteloBranco\Cemet\Modules\Fotografia\Model\FotografiaTabela::update($fotografia, $classe);
        }
        return array(
            "fotografia" => $fotografia
        );
    }

    public function indexAction() {
        $foto = \CasteloBranco\Cemet\Modules\Fotografia\Model\FotografiaTabela::
                find(["idpessoa" => filter_input(INPUT_GET, "idpessoa")]);
        return array(
            "foto" => $foto
        );
    }

}
