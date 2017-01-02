<?php
namespace CasteloBranco\Cemet\Modules\Instrutor\Controller;
use CasteloBranco\Cemet\Interfaces\IController;
/**
 * Description of InstrutorController
 *
 * @author ricardo
 */
class InstrutorController implements IController{
    public function addAction() {
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(["idturma" => filter_input(INPUT_GET, "idturma")]);
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::
                find(["iddisciplina" => filter_input(INPUT_GET, "iddisciplina")]);
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                find(["idcompanhia" =>$turma->getCompanhia()]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => $companhia->getIdCurso()]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            if(filter_input(INPUT_POST, "btn_action") == "Busca"){
                $pessoa = $this->buscaInstrutor(filter_input(INPUT_POST, "cpf"));
            }
            if(filter_input(INPUT_POST, "btn_action") == "Insere"){
                $this->insereInstrutor(filter_input_array(INPUT_POST));
            }
        }
        return array(
            "turma" => $turma,"pessoa" => $pessoa,"companhia" => $companhia,
            "curso" => $curso,"disciplina" => $disciplina
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $instrutor = \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                    find(["idinstrutor" => filter_input(INPUT_GET, "idinstrutor"),]);
        $disciplina = \CasteloBranco\Cemet\Modules\Disciplina\Model\DisciplinaTabela::find(["iddisciplina" => $instrutor->getIdDisciplina()]);
        $pessoa = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::find(["idpessoa" => $instrutor->getIdPessoa()]);
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::find(["idturma" => $instrutor->getIdTurma()]);
        $companhia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::find(["idcompanhia" =>$turma->getCompanhia()]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::find(["idcurso" => $companhia->getIdCurso()]);
        
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            if(filter_input(INPUT_POST, "btn_action") == "Busca"){
                $pessoa = $this->buscaInstrutor(filter_input(INPUT_POST, "cpf"));
            }
            if(filter_input(INPUT_POST, "btn_action") == "Altera"){
                $classe = \CasteloBranco\Cemet\Factory\Creator::factoryMethod(\CasteloBranco\Cemet\Modules\Instrutor\Model\Instrutor::class,filter_input_array(INPUT_POST));
                $this->atualizaInstrutor($instrutor, $classe);
            }
        }
        return array(
            "instrutor" => $instrutor,"turma" => $turma,"pessoa" => $pessoa,
            "companhia" => $companhia,"curso" => $curso,"disciplina" => $disciplina
        );
    }

    public function indexAction() {
        define("IDTURMA", filter_input(INPUT_GET, "idturma"));
        $turma = \CasteloBranco\Cemet\Modules\Turma\Model\TurmaTabela::
                find(["idturma" => filter_input(INPUT_GET, "idturma")]);
        $cia = \CasteloBranco\Cemet\Modules\Companhia\Model\CompanhiaTabela::
                find(["idcompanhia" => $turma->getCompanhia()]);
        $curso = \CasteloBranco\Cemet\Modules\Curso\Model\CursoTabela::
                find(["idcurso" => $cia->getIdCurso()]);
        $instrutores = \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                findAll();
        return array(
            "instrutores" => $instrutores, "curso" => $curso, "companhia" => $cia,
            "turma" => $turma
        );
    }
    
    private function buscaInstrutor($idInstrutor){
        $pessoa = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::
                        find(["cpf" => str_replace([".","-"],"",$idInstrutor)]);
        if($pessoa){
           return $pessoa;    
        }else{
            echo "<script type='text/javascript'>alert('Usuário não localizado!');"
            . "location.href ='?module=Pessoa&page=add.php';</script>";
        }
    }
    
    private function insereInstrutor(array $dados){
        $classe = \CasteloBranco\Cemet\Factory\Creator::
        factoryMethod(\CasteloBranco\Cemet\Modules\Instrutor\Model\Instrutor::class,
            $dados);
        \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
            insert($classe);
        header("location:?module=Instrutor&page=show_instrutor.php&idturma=".$classe->getIdTurma());   
    }
    private function atualizaInstrutor($instrutor, $instrutorAtualizado){
        $instrutorDes = new \CasteloBranco\Cemet\Modules\Instrutor\Model\Instrutor($instrutor->getValues());
        $instrutorDes->setDesistencia("1");
        \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                update($instrutor, $instrutorDes);
        
         \CasteloBranco\Cemet\Modules\Instrutor\Model\InstrutorTabela::
                 insert($instrutorAtualizado);
        header("location:?module=Instrutor&page=show_instrutor.php&idturma=".$instrutor->getIdTurma());
    }

}
