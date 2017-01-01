<?php
namespace CasteloBranco\Cemet\Modules\Pessoa\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of PessoaController
 *
 * @author ricardo
 */
class PessoaController implements IController{
    public function addAction() {
        $cargos = \CasteloBranco\Cemet\Modules\Cargo\Model\CargoTabela::findAll();
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Pessoa\Model\Pessoa::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::insert($classe);
            header("location:?module=Pessoa&page=index.php");
        }
        return array(
            "cargos" => $cargos
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $cargos = \CasteloBranco\Cemet\Modules\Cargo\Model\CargoTabela::findAll();
        $pessoa = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::
                find(["idpessoa" =>filter_input(INPUT_GET, "idpessoa")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Pessoa\Model\Pessoa::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::update($pessoa, $classe);
            header("location:?module=Pessoa&page=index.php");
        }
        return array(
            "cargos" => $cargos,
            "pessoa" => $pessoa
        );
    }

    public function indexAction() {
        $pessoas = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::findAll();
        return array(
            "pessoas" => $pessoas,
        );
    }

}
