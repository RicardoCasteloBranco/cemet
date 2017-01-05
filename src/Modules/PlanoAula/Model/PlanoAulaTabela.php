<?php
namespace CasteloBranco\Cemet\Modules\PlanoAula\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of PlanoAulaTabela
 *
 * @author ricardo
 */
class PlanoAulaTabela implements ITabela{
    
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("planoaula");
        return $tr;
    }

    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(PlanoAula::class, $tr->find($id));
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setJoin("INNER","pladis","planoaula","idaula","idaula");
        $table->setWhere(["idinstrutor" => IDINSTRUTOR]);
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
    
    public static function showDisciplinas($idpessoa){
        $tr = new \CasteloBranco\Cemet\Data\Transation("disciplina");
        $table = $tr->getTable();
        $table->setJoin("INNER","instrutor","disciplina","iddisciplina","iddisciplina");
        $table->setJoin("INNER","curso","disciplina","idcurso","idcurso");
        $table->setJoin("INNER","turma","instrutor","idturma","idturma");
        $table->setWhere(["datadesistencia" => NULL, "idpessoa" => $idpessoa]);
        $tr->setTable($table);
        return $tr->findAll();
    }

}
