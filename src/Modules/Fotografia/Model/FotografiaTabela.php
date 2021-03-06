<?php
namespace CasteloBranco\Cemet\Modules\Fotografia\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of FotografiaTabela
 *
 * @author antonio
 */
class FotografiaTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("fotografia");
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