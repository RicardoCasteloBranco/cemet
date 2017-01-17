<?php
namespace CasteloBranco\Cemet\Modules\Aluno\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of AlunoTabela
 *
 * @author antonio
 */
class AlunoTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("aluno");
        return $tr;
    }
    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $cols = ["aluno.idaluno","aluno.idpessoa","aluno.idturma","aluno.datapraca",
            "aluno.datanasc","aluno.nomebanco","aluno.agencia","aluno.contacorrente",
            "aluno.numefisco","aluno.rua","aluno.bairro","aluno.cidade","aluno.estadocivil",
            "aluno.pai","aluno.mae","aluno.religiao","aluno.genero","aluno.identidadecivil",
            "aluno.orgaoexpedidoridcivil","aluno.categoria","aluno.renach","aluno.validadehabilitacao",
            "aluno.rgmilitar","aluno.camisa","aluno.calca","aluno.calcado","aluno.cobertura",
            "aluno.graudeinstrucao","aluno.curso_formacao","aluno.qtddependentes","aluno.celular",
            "aluno.telefone","aluno.matricula","aluno.nomeguerra","aluno.telefonecontato",
            "aluno.pontoreferencia","aluno.numeroaluno","aluno.situacao","aluno.desligamento",
            "aluno.motivodesligamento","pessoa.nome","pessoa.cpf","pessoa.email"];
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setCols($cols);
        $table->setJoin("INNER","pessoa","aluno","idpessoa","idpessoa");
      
        $dados = $tr->find($id);
        return \CasteloBranco\Cemet\Factory\Creator::factoryMethod(Aluno::class, $dados);
    }

    public static function findAll() {
        $cols = ["aluno.idaluno","pessoa.nome as nome_completo","aluno.nomeguerra",
            "aluno.matricula","aluno.rua","cidades.nome as cidade","aluno.bairro",
            "estados.uf as estado","pessoa.email","CONCAT_WS(',',telefone,celular,telefonecontato)",
            "turma.turma","curso.siglacurso","aluno.desligamento","aluno.motivodesligamento",
            "aluno.situacao","aluno.numeroaluno"];
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setCols($cols);
        $table->setJoin("INNER","pessoa","aluno","idpessoa","idpessoa");
        $table->setJoin("INNER","cidades","aluno","idcidade","cidade");
        $table->setJoin("INNER","estados","cidades","idestado","estado");
        $table->setJoin("INNER","estado_civil","aluno","idestadocivil","estadocivil");
        $table->setJoin("LEFT","turma","aluno","idturma","idturma");
        $table->setJoin("LEFT","companhia","turma","idcompanhia","companhia");
        $table->setJoin("LEFT","curso","companhia","idcurso","idcurso");
        $tr->setTable($table);
        return $tr->findAll();
    }

    public static function insert($classe) {
        $tr = self::getInstancia();
        return $tr->insert($classe);
    }

    public static function update($classeAnt, $classePos) {
        $tr = self::getInstancia();
        $tr->update($classeAnt, $classePos);
    }
    
    public static function tabelaCursosFora(){
        $tr = new \CasteloBranco\Cemet\Data\Transation("cursos_fora");
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function tabelaGeneros(){
        $tr = new \CasteloBranco\Cemet\Data\Transation('genero');
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function tabelaEstadoCivil(){
        $tr = new \CasteloBranco\Cemet\Data\Transation('estado_civil');
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function tabelaReligiao(){
        $tr = new \CasteloBranco\Cemet\Data\Transation('religiao');
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function tabelaGrauInstrucao(){
        $tr = new \CasteloBranco\Cemet\Data\Transation('grau_instrucao');
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function tabelaEstados(){
        $tr = new \CasteloBranco\Cemet\Data\Transation('estados');
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function tabelaCidades(){
        $tr = new \CasteloBranco\Cemet\Data\Transation('cidades');
        $table = $tr->getTable();
        $tr->setTable($table);
        return $tr->findAll();
    }
}
