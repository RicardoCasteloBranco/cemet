<?php
namespace CasteloBranco\Cemet\Modules\PlanoAula\Model;
use CasteloBranco\Cemet\Interfaces\ITabela;
/**
 * Description of PlanoAulaTabela
 *
 * @author ricardo
 */
class PlanoAulaTabela implements ITabela{
    
    public static function getInstancia() {
        $tr = new \CasteloBranco\Cemet\Data\Transation("planoaula");
        return $tr;
    }

    public static function delete($id) {
        $tr = self::getInstancia();
        $tr->delete($id);
    }

    public static function find($id) {
        $tr = self::getInstancia();
        return \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(PlanoAula::class, $tr->find($id));
    }

    public static function findAll() {
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setJoin("INNER","pladis","planoaula","idaula","idaula");
        $table->setWhere(["idinstrutor" => IDINSTRUTOR]);
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
    
    public static function showDisciplinas($idpessoa){
        $tr = new \CasteloBranco\Cemet\Data\Transation("disciplina");
        $table = $tr->getTable();
        $table->setJoin("INNER","instrutor","disciplina","iddisciplina","iddisciplina");
        $table->setJoin("INNER","curso","disciplina","idcurso","idcurso");
        $table->setJoin("INNER","turma","instrutor","idturma","idturma");
        $table->setWhere(["datadesistencia" => NULL, "idpessoa" => $idpessoa]);
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function getInstrutores($idTurma, $idDisciplina){
        $tr = new \CasteloBranco\Cemet\Data\Transation("instrutor");
        $table = $tr->getTable();
        $table->setJoin("INNER","pessoa","instrutor","idpessoa","idpessoa");
        $table->setJoin("INNER","cargo","pessoa","idcargo","idcargo");
        $table->setWhere(["idturma" => $idTurma]);
        $table->setWhere(["iddisciplina" => $idDisciplina]);
        $table->setWhere(["datadesistencia" => NULL]);
        $tr->setTable($table);
        return $tr->findAll();
    }
    
    public static function contadorAula($idInstrutor,$data, $turno){
        $sql = "SELECT SUM(qtdaula) as qtd FROM planoaula
                WHERE data < '$data' AND idinstrutor LIKE '$idInstrutor';";
        $ds = new \CasteloBranco\Cemet\Data\DataSet();
        $aulasAntes = $ds->row($sql);
        
        $sql = "SELECT SUM(qtdaula) as qtd FROM planoaula 
                WHERE data LIKE '$data' AND idinstrutor LIKE '$idInstrutor' "
                . "AND turno < '$turno';";
        $ds2 = new \CasteloBranco\Cemet\Data\DataSet();
        $aulasHoje = $ds2->row($sql);
        return (int)$aulasAntes['qtd'] + (int)$aulasHoje['qtd'];
    }
}
