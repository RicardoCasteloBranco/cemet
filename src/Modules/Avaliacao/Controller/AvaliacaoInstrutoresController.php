<?php
namespace CasteloBranco\Cemet\Modules\Avaliacao\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of AvaliacaoInstrutoresController
 *
 * @author Ricardo
 */
class AvaliacaoInstrutoresController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Avaliacao\Model\AvaliacaoInstrutores::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Avaliacao\Model\AvaliacaoInstrutoresTabela::
                    insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $avaliacao = \CasteloBranco\Cemet\Modules\Avaliacao\Model\AvaliacaoInstrutoresTabela::
        find(filter_input(INPUT_GET, "idavaliacao"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Avaliacao\Model\AvaliacaoInstrutores::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Avaliacao\Model\AvaliacaoInstrutoresTabela::
                    insert($classe);
            header();
        }
        return array(
            "avaliacao" => $avaliacao
        );
    }

    public function indexAction() {
        $avaliacao = \CasteloBranco\Cemet\Modules\Avaliacao\Model\AvaliacaoInstrutoresTabela::
                findAll();
        return array(
            "avaliacao" => $avaliacao
        );
    }

}
