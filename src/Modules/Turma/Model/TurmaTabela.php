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
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(Turma::class, $tr->find($id));
    }

    public static function findAll() {
        $cols = ["idturma","turma","companhia","sala",
            "(SELECT COUNT(idpessoa) FROM aluno WHERE aluno.idturma = turma.idturma) "
            . "AS qtd_alunos ",
            "(SELECT CONCAT_WS(' ', cargo.abreviatura, orgao.sigla,pessoa.nome) "
            . "FROM coordenador INNER JOIN pessoa ON (coordenador.idpessoa = pessoa.idpessoa) "
            . "INNER JOIN cargo ON (pessoa.idcargo = cargo.idcargo) INNER JOIN orgao ON "
            . "(cargo.idorgao=orgao.idorgao) WHERE coordenador.idturma = turma.idturma)"
            . " as coordenador"];
        
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setCols($cols);
        $table->setWhere(["companhia" => COMPANHIA]);
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
