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
        $cols = ["disciplina.iddisciplina","disciplina.disciplina","disciplina.sigla", "instrutor.idinstrutor", "instrutor.idpessoa",
"turma.idturma","(SELECT pessoa.nome FROM pessoa WHERE pessoa.idpessoa = instrutor.idpessoa) as instrutor",
"instrutor.matricula","instrutor.tipo_instrutor","instrutor.datainscricao","instrutor.datadesistencia"];
        $tr = new \CasteloBranco\Cemet\Data\Transation("disciplina");
        $table = $tr->getTable();
        $table->setCols($cols);
        $table->setJoin("INNER","curso","disciplina","idcurso","idcurso");
        $table->setJoin("INNER","companhia","curso","idcurso","idcurso");
        $table->setJoin("INNER","turma","companhia","companhia","idcompanhia");
        $table->setJoin("LEFT","instrutor","turma","idturma","idturma");
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
