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
    
    public function indexAction(){        
        $pessoa = unserialize($_SESSION["pessoa"]);
        $menu = ApplicationTabela::montaMenu($pessoa);
        return array(
            "pessoa" => $pessoa,
            "menu" => $menu
        );
    }
    
    public function loginAction(){
        if(!$this->verificaBrowser()){
            header("location:../Modules/Application/view/bootstrap.php?module=Application&page=navegador.php");
        }
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $cpf = str_replace([".","-"],"",filter_input(INPUT_POST, "cpf"));
            $pessoa = ApplicationTabela::getUsuario($cpf);
            if($pessoa->getSenha() == md5(filter_input(INPUT_POST, "senha"))){
                $_SESSION["pessoa"] = serialize($pessoa);
                header("location:../Modules/Application/view/index.php?module=Application"
                        . "&page=mensagem.php");
            }else{
                echo "<script type='text/javascript'>alert('Senha não confere')</script>";
            }
        }
    }
    
    public function exitAction(){
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            header("location:../../../public/index.php");
        }
        
    }
}