<?php
namespace CasteloBranco\Cemet\Modules\Cidade\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of CidadeTabela
 *
 * @author antonio
 */
class CidadeTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("cidades");
        return $tr;
    }
    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(Cidade::class, $tr->find($id));
    }

    public static function findAll() {
        $idEstado = IDESTADO;
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setWhere(["estado" => $idEstado]);
        $table->setOrder("nome");
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
