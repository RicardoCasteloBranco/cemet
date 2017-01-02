<?php
namespace CasteloBranco\Cemet\Modules\PlanoAula\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of PlanoAulaController
 *
 * @author ricardo
 */
class PlanoAulaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAula::class, $dados);
            \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $planoAula = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::
                find(["idplano" => filter_input(INPUT_GET,"idplano")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAula::class, $dados);
            \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::update($planoAula, $classe);
            header();
        }
        return array(
            "planoaula" => $planoAula
        );
    }

    public function indexAction() {
        $planos = \CasteloBranco\Cemet\Modules\PlanoAula\Model\PlanoAulaTabela::findAll();
        return array(
            "planos" => $planos
        );
    }

}
