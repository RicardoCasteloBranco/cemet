<?php
namespace CasteloBranco\Cemet\Modules\Aluno\Controller;
use CasteloBranco\Cemet\Interfaces\IController;

/**"
 * Description of AlunoController
 *
 * @author antonio
 */
class AlunoController implements IController{
    public function addAction() {
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Aluno\Model\Aluno::class,
                            $dados);
            $pessoa = $classe->getPessoa();
            $idPessoa = \CasteloBranco\Cemet\Modules\Pessoa\Model\PessoaTabela::
                    insert($pessoa);
            $classe->setIdPessoa($idPessoa);
            $idAluno = \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::insert($classe);
            header("location:?module=Fotografia&page=add.php&idaluno=".$idAluno);
        }
        return array(
            "estados" => \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::tabelaEstados(),
            "estado_civil" => \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::tabelaEstadoCivil(),
            "genero" => \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::tabelaGeneros(),
            "cursos" => \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::tabelaCursosFora(),
            "grau_instrucao" => \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::tabelaGrauInstrucao(),
            "religiao" => \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::tabelaReligiao()
        );
    }

    public function deleteAction() {
        
    }

    public function editAction() {
        $aluno = \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::
                find(["idaluno" => filter_input(INPUT_GET, "idaluno")]);
        if(filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST"){
            $dados = filter_input_array(INPUT_POST);
            $classe = \CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Aluno\Model\Aluno::class,
                            $dados);
            \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::update($aluno, $classe);
            header();
        }
        return array(
            "aluno" => $aluno
        );
    }

    public function indexAction() {
        $alunos = \CasteloBranco\Cemet\Modules\Aluno\Model\AlunoTabela::findAll();
        return array(
            "alunos" => $alunos
        );
    }
}
