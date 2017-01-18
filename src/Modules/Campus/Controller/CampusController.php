<?php
namespace CasteloBranco\Cemet\Modules\Campus\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of CampusController
 *
 * @author antonio
 */
class CampusController implements IController{
    public function addAction() {
        $orgaos = \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Campus\Model\Campus::class, $dados);
            \CasteloBranco\Cemet\Modules\Campus\Model\CampusTabela::insert($classe);
            header("location:?module=Campus&page=index.php");
        }
        return array(
            "orgaos" => $orgaos
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $campus = \CasteloBranco\Cemet\Modules\Campus\Model\CampusTabela::
                find(["idcampus" => filter_input(INPUT_GET,"idcampus")]);
        $orgaos = \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Campus\Model\Campus::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Campus\Model\CampusTabela::update($campus, $classe);
            header("location:?module=Campus&page=index.php");
        }
        return array(
            "campus" => $campus, "orgaos" => $orgaos
        );
    }

    public function indexAction() {
        $campi = \CasteloBranco\Cemet\Modules\Campus\Model\CampusTabela::findAll();
        return array(
            "campi" => $campi
        );
    }

}
