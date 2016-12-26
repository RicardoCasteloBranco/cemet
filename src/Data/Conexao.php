<?php
namespace CasteloBranco\Cemet\Data;
use CasteloBranco\Cemet\Interfaces\IConnect;

/**
 * Description of Conexao
 * Classe que realiza conexão com o banco de dados.
 * @author ricardo
 */
class Conexao implements IConnect{
    protected static $instance;
    
    public static function getConection() {
        if(!isset(self::$instance)){
            $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => IConnect::CHARSET);
            $instance = new \PDO(sprintf("%s:host=%s;dbname=%s",
                    IConnect::DRIVER,  IConnect::HOST , IConnect::DBNAME),
                    IConnect::USER,IConnect::PSWD,$options);
            self::$instance = $instance;
        }
        return self::$instance;
    }
}
