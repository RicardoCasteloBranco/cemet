<?php
namespace CasteloBranco\Cemet\Modules\Instrutor\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;

/**
 * Description of InstrutorTabela
 *
 * @author ricardo
 */
class InstrutorTabela implements ITabela{
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("instrutor");
        return $tr;
    }

    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(Instrutor::class, $tr->find($id));
    }

    public static function findAll() {
        $cols = ["disciplina.iddisciplina", "turma.idturma","instrutor.idinstrutor",
                "turma.turma","turma.sala","instrutor.idpessoa", "instrutor.tipo_instrutor",
                "instrutor.desistencia", "instrutor.datadesistencia", "instrutor.datainscricao",
                "disciplina.disciplina", "pessoa.nome", "pessoa.email", "cargo.abreviatura"];
        $tr = new \CasteloBranco\Cemet\Data\Transation("disciplina");
        $table = $tr->getTable();
        $table->setCols($cols);
        $table->setJoin("LEFT","companhia","disciplina","idcurso","idcurso");
        $table->setJoin("LEFT","turma","companhia","companhia","idcompanhia");
        $table->setJoin("LEFT","instrutor","turma","idturma","idturma AND "
                . "instrutor.iddisciplina = disciplina.iddisciplina");
        $table->setJoin("LEFT","pessoa","instrutor","idpessoa","idpessoa");
        $table->setJoin("LEFT","cargo","pessoa","idcargo","idcargo");
        $table->setJoin("LEFT","orgao","cargo","idorgao","idorgao");
        $table->setHaving(["idturma" => IDTURMA]);
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
