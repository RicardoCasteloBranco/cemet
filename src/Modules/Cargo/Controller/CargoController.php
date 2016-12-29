<?php
namespace CasteloBranco\Cemet\Modules\Cargo\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of CargoController
 *
 * @author Ricardo
 */
class CargoController implements IController{
    public function addAction() {
        $orgaos = \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Cargo\Model\Cargo::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Cargo\Model\CargoTabela::insert($classe);
            header("location:?module=Cargo&page=index.php");
        }
        return array(
            "orgaos" => $orgaos
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $cargo = \CasteloBranco\Cemet\Modules\Cargo\Model\CargoTabela::
                find(["idcargo" => filter_input(INPUT_GET, "idcargo")]);
        $orgaos = \CasteloBranco\Cemet\Modules\Orgao\Model\OrgaoTabela::findAll();
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Cargo\Model\Cargo::class, $dados);
            \CasteloBranco\Cemet\Modules\Cargo\Model\CargoTabela::update($cargo, $classe);
            header("location:?module=Cargo&page=index.php");
        }
        return array(
            "cargo" => $cargo,
            "orgaos" => $orgaos,
        );
    }

    public function indexAction() {
        $cargos = \CasteloBranco\Cemet\Modules\Cargo\Model\CargoTabela::findAll();
        return array(
            "cargos" => $cargos
        );
    }

}
