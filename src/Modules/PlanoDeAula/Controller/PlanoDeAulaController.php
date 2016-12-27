<?php
namespace CasteloBranco\Cemet\Modules\PlanoDeAula\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of PlanoDeAulaController
 *
 * @author ricardo
 */
class PlanoDeAulaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoDeAula\Model\PlanoDeAula::class, 
                            $dados);
            \CasteloBranco\Cemet\Modules\PlanoDeAula\Model\PlanoDeAulaTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $plano = \CasteloBranco\Cemet\Modules\PlanoDeAula\Model\PlanoDeAulaTabela::
                find(filter_input(INPUT_GET, "idplano"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoDeAula\Model\PlanoDeAula::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\PlanoDeAula\Model\PlanoDeAulaTabela::update($plano, $classe);
            header();
        }
        return array(
            "plano" => $plano
        );
    }

    public function indexAction() {
        $planos = \CasteloBranco\Cemet\Modules\PlanoDeAula\Model\PlanoDeAulaTabela::
                findAll();
        return array(
            "planos" => $planos
        );
    }

}
