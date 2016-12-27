<?php
namespace CasteloBranco\Cemet\Modules\Turma\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of TurmaTabela
 *
 * @author ricardo
 */
class TurmaTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("turma");
        return $tr;
    }

    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return $tr->find($id);
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
}
