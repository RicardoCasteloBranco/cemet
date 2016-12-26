<?php
namespace CasteloBranco\Cemet\Modules\Application\Controller;
use CasteloBranco\Cemet\Modules\Application\Model\ApplicationTabela;
use Ikimea\Browser\Browser;
session_start();
/**
 * Description of ApplicationController
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class ApplicationController {

    private function verificaBrowser(){
        $browser = new Browser();
        $verificador = false;
        switch ($browser->getBrowser()){
            case "Chrome": $verificador = true;
                            break;
            case "Edge" : $verificador = true;
                            break;
            case "Opera": $verificador = true;
            			  break;
        }
        return $verificador;
    }
}