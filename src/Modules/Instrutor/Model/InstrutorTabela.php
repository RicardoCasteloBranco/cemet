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
        $sql = "SELECT * 
                FROM disciplina 
                LEFT JOIN companhia ON(companhia.idcurso=disciplina.idcurso) 
                LEFT JOIN turma ON(turma.companhia=companhia.idcompanhia)
                LEFT JOIN instrutor ON (instrutor.idturma = turma.idturma AND instrutor.iddisciplina = disciplina.iddisciplina)
                LEFT JOIN pessoa ON (pessoa.idpessoa = instrutor.idpessoa)
                LEFT JOIN cargo ON (cargo.idcargo = pessoa.idcargo)
                LEFT JOIN orgao ON (orgao.idorgao = cargo.idorgao)
                HAVING turma.idturma LIKE '".IDTURMA."';";
        $ds = new \CasteloBranco\Cemet\Data\DataSet();
        return $ds->table($sql);
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
