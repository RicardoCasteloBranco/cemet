<?php
namespace CasteloBranco\Cemet\Modules\Orgao\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of OrgaoController
 *
 * @author Ricardo
 */
class OrgaoController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Orgao\Model\Orgao::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::insert($classe);
            header("location:?module=Orgao&page=index.php");
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $orgao = \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::
                find(["idorgao" => filter_input(INPUT_GET, "idorgao")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Orgao\Model\Orgao::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::update($orgao, $classe);
            header("location:?module=Orgao&page=index.php");
        }
        return array(
            "orgao" => $orgao
        );
    }

    public function indexAction() {
        $orgaos = \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::findAll();
        return array(
            "orgaos" => $orgaos
        );
    }

}
