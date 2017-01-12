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
        $tr = self::getInstancia();
        $dados = $tr->find($id);
        return \CasteloBranco\Cemet\Factory\Creator::factoryMethod(Aluno::class, $dados);
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
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
