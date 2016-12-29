<?php
namespace CasteloBranco\Cemet\Modules\Companhia\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of CompanhiaController
 *
 * @author Ricardo
 */
class CompanhiaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Companhia\Model\Companhia::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                find(["idcompanhia" => filter_input(INPUT_GET, "idcompanhia")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Companhia\Model\Companhia::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::update($companhia, $classe);
            header();
        }
    }

    public function indexAction() {
        $companhias = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                findAll();
        return array(
            "companhias" => $companhias
        );
    }

}
