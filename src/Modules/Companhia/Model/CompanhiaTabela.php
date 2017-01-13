<?php
namespace CasteloBranco\Cemet\Modules\Companhia\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;

/**
 * Description of CompanhiaTabela
 *
 * @author Ricardo
 */
class CompanhiaTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("companhia");
        return $tr;
    }
    
    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(Companhia::class, $tr->find($id));
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setJoin("LEFT","pessoa","companhia","idpessoa","comandante");
        $table->setJoin("LEFT","cargo","pessoa","idcargo","idcargo");
        $table->setWhere(["idcurso" => IDCURSO]);
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
