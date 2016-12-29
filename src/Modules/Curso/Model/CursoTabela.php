<?php
namespace CasteloBranco\Cemet\Modules\Curso\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of CursoTabela
 *
 * @author ricardo
 */
class CursoTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("curso");
        return $tr;
    }
    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(Curso::class, $tr->find($id));
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setJoin("INNER","orgao","curso","idorgao","idorgao");
        $table->setOrder("curso.idorgao");
        $tr->setTable($table);
        return $tr->findAll();
    }

    public static function insert($classe) {
        $tr = self::getInstancia();
        return $tr->insert($classe);
    }

    public static function update($classeAnt, $classePos) {
        
    }
}
