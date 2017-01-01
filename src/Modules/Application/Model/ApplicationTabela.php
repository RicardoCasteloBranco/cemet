<?php
namespace CasteloBranco\Cemet\Modules\Application\Model;

/**
 * Description of ApplicationTabela
 *
 * @author ricardo
 */
class ApplicationTabela {
    private static $menu = array();
    
    public static function montaMenu(\CasteloBranco\Cemet\Modules\Pessoa\Model\Pessoa $pessoa){
        self::tabelaMenu($pessoa);
        return self::$menu;
    }
    
    private static function tabelaMenu(\CasteloBranco\Cemet\Modules\Pessoa\Model\Pessoa $pessoa){
        $tr = new \CasteloBranco\Cemet\Data\Transation("menu");
        $table = $tr->getTable();
        $table->setJoin("INNER","perfil_menu","menu","idmenu","idmenu");
        $table->setJoin("INNER","pessoa_perfil","perfil_menu","idperfil","idperfil");
        $table->setWhere(["idpessoa" => $pessoa->getIdPessoa()]);
        $tr->setTable($table);
        self::setArray($tr->findAll());
    }
    
    public static function getUsuario($cpf){
        $tr = new \CasteloBranco\Cemet\Data\Transation("pessoa");
        $dados = $tr->find(["cpf" => $cpf]);
        if($dados){
            $pessoa = \CasteloBranco\Cemet\Factory\Creator::
                factoryMethod(\CasteloBranco\Cemet\Modules\Pessoa\Model\Pessoa::class,
                        $dados);
            return $pessoa;
        }else{
            echo "<script type='text/javascript'>alert('Usuário não localizado')</script>";
        }
        
    }
    
    private static function setArray(array $tabela){
        foreach ($tabela as $row){
            if(!isset(self::$menu[$row->menu_pai])){
                self::$menu[$row->menu_pai] = \CasteloBranco\Cemet\Modules\Menu\Model\MenuTabela::
                    find(["idmenu" => $row->menu_pai]);
            }
            self::$menu[$row->menu_pai]->setMenuFilho(\CasteloBranco\Cemet\Factory\Creator::
                    factoryMethod(\CasteloBranco\Cemet\Modules\Menu\Model\Menu::class, (array)$row));
        }
    }
}
