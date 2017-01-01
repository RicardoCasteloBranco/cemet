<?php
namespace CasteloBranco\Cemet\Modules\Pessoa\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of PessoaTabela
 *
 * @author ricardo
 */
class PessoaTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("pessoa");
        return $tr;
    }

    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        $dados = $tr->find($id);
        if($dados){
            return \CasteloBranco\Cemet\Factory\Creator::factoryMethod(Pessoa::class,
               $dados);
        }else{
            return false;
        }
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setJoin("INNER","cargo","pessoa","idcargo","idcargo");
        $table->setJoin("INNER","orgao","cargo","idorgao","idorgao");
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
