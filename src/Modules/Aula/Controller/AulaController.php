<?php
namespace CasteloBranco\Cemet\Modules\Aula\Controller;
use CasteloBranco\Cemet\Interfaces\IController;

/**
 * Description of AulaController
 *
 * @author ricardo
 */
class AulaController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Aula\Model\Aula::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::insert($classe);
            header();
        }
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $aula = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::
                find(filter_input(INPUT_GET, "idaula"));
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Aula\Model\Aula::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::update($aula, $classe);
            header();
        }
        return array(
            "aula" => $aula
        );
    }

    public function indexAction() {
        $aulas = \CasteloBranco\Cemet\Modules\Aula\Model\AulaTabela::findAll();
        return array(
            "aulas" => $aulas
        );
    }

}
