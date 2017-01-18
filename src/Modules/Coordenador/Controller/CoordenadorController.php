<?php
namespace CasteloBranco\Cemet\Modules\Coordenador\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of CoordenadorController
 *
 * @author ricardo
 */
class CoordenadorController implements IController{
    public function addAction() {
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(["idturma" => filter_input(INPUT_GET, "idturma")]);
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                find(["idcompanhia" =>$turma->getCompanhia()]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => $companhia->getIdCurso()]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            if(filter_input(INPUT_POST, "btn_action") == "Busca"){
                $pessoa = $this->buscaCoordenador(filter_input(INPUT_POST   , "cpf"));
            }
            if(filter_input(INPUT_POST, "btn_action") == "Insere"){
                $this->insereCoordenador(filter_input_array(INPUT_POST),$companhia->getIdCompanhia());
            }
        }
        return array(
            "turma" => $turma,
            "pessoa" => $pessoa,
            "companhia" => $companhia,
            "curso" => $curso
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $coordenador = \CasteloBranco\Cemet\Modules\Coordenador\Model\CoordenadorTabela::find(["idturma" => filter_input(INPUT_GET, "idturma")]);
        $pessoa = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::find(["idpessoa" => $coordenador->getIdPessoa()]);
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::find(["idturma" => $coordenador->getIdTurma()]);
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::find(["idcompanhia" =>$turma->getCompanhia()]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::find(["idcurso" => $companhia->getIdCurso()]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            if(filter_input(INPUT_POST, "btn_action") == "Busca"){
                $pessoa = $this->buscaCoordenador(filter_input(INPUT_POST, "cpf"));
            }
            if(filter_input(INPUT_POST, "btn_action") == "Altera"){
                $classe = \CasteloBranco\Cemet\Factory\Creator::factoryMethod(\CasteloBranco\Cemet\Modules\Coordenador\Model\Coordenador::class,filter_input_array(INPUT_POST));
                $this->atualizaCoordenador($coordenador, $classe);
            }
        }
        return array(
            "coordenador" => $coordenador,"turma" => $turma,"pessoa" => $pessoa,
            "companhia" => $companhia,"curso" => $curso
        );
    }

    public function indexAction() {
        
    }
    
    private function buscaCoordenador($idCoordenador){
        $pessoa = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::
                        find(["cpf" => str_replace([".","-"],"",$idCoordenador)]);
        if($pessoa){
           return $pessoa;    
        }else{
            echo "<script type='text/javascript'>alert('Usuário não localizado!');"
            . "location.href ='?module=Pessoa&page=add.php';</script>";
        }
    }
    
    private function insereCoordenador(array $dados, $idCompanhia){
        $classe = \CasteloBranco\Cemet\Factory\Creator::
        factoryMethod(\CasteloBranco\Cemet\Modules\Coordenador\Model\Coordenador::class,
            $dados);
        \CasteloBranco\Cemet\Modules\Coordenador\Model\CoordenadorTabela::
            insert($classe);
        header("location:?module=Turma&page=index.php&idcompanhia=$idCompanhia");   
    }
    private function atualizaCoordenador($coordenador, $coordenadorAtualizado){
        \CasteloBranco\Cemet\Modules\Coordenador\Model\CoordenadorTabela::
                update($coordenador, $coordenadorAtualizado);
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(["idturma" => $coordenador->getIdTurma()]);
        header("location:?module=Turma&page=index.php&idcompanhia=".$turma->getCompanhia());
    }

}
