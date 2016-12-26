<?php
namespace CasteloBranco\Cemet\Data\Table;
use CasteloBranco\Cemet\Data\DataSet;
/**
 * Description of UpdateData
 *
 * @author Ricardo
 */
class UpdateData extends DataSet{
    private $tblName;
    private $cols = array();
    private $order = array();
    private $where = array();
    public function __construct($tblName) {
        $this->tblName = $tblName;
    }

    public function getComando() {
        $cmd = "UPDATE $this->tblName SET ".substr($this->getCols(),0,-1).$this->space($this->order);
        $cmd .= substr($this->getOrder(),0,-1).$this->space($this->where);
        $cmd .= $this->getWhere();
        $cmd .= ";";
        return $cmd;
    }
    
    private function getCols(){
        $cols = NULL;
        if(count($this->cols)>0){
            for ($i=0; $i<count($this->cols); $i++){
                $cols .= $this->cols[$i]." = :".$this->cols[$i].",";
            }
        }
        return $cols;
    }
    
    private function getOrder(){
        $order = NULL;
        if(count($this->order)>0){
            $order .= "ORDER BY ";
            foreach ($this->order as $key =>$str){
                $order .= "$str";
                if(!is_int($key)){
                    $order .= " ".$key;
                }
                $order .= ",";
            }
        }
        return $order;
    }
    
    private function getWhere(){
        $where = NULL;
        $termos = NULL;
        if(count($this->where)>0){
            $where .= "WHERE ";
            foreach ($this->where as $str){
                if(is_null($this->values[$str])){
                    $termos .= "$str IS NULL AND ";
                }else{
                   $termos .= "$str LIKE :".strtoupper($str)." AND "; 
                }
            }
            $where .= substr($termos,0,-5);
        }
        return $where;
    }
    
    private function space(array $var){
        if(count($var)>0){
            return " ";
        }
        return NULL;
    }
    
    public function setCols(array $cols) {
        $this->cols = array_merge($this->cols,$cols);
    }

    public function setVals(array $vals) {
        $this->values = array_merge($this->values,$vals);
    }
    
    public function setOrder($column, $order = NULL){
        if(is_null($order)){
            array_push($this->order, $column);
        }else{
            $this->order[$order] = $column;
        }
    }
    
    public function setWhere(array $where){
        $this->where = array_merge($this->where,$where);
    }
    
    public function execute($sql = NULL) {
        $sql .= $this->getComando();
        return parent::execute($sql);
    }

}
