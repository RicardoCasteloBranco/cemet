<?php
namespace CasteloBranco\Cemet\Modules\Application\Model;

/**
 * Description of ApplicationTabela
 *
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class ApplicationTabela {
    public static function getInstancia(){
        $tr = new \CasteloBranco\Cemet\Data\Transation("menu m");
        return $tr;
    }
    public static function selectMenu($id){
        $tr = self::getInstancia();
        $table = $tr->getTable();
        $table->setCols(["m1,menu_id","m1.menu_descricao",
            "(SELECT func_caminho FROM funcionalidade f1 WHERE f1.func_id = m1.func_id) "
            . "as func_caminho"]);
        $table->setJoin("LEFT", "menu m1","m","menu_id","menu_pai");
        $table->setJoin("LEFT", "funcionalidade","m","func_id","func_id");
        $table->setJoin("LEFT", "perfil_funcionalidade","funcionalidade","func_id","func_id");
        $table->setJoin("LEFT", "perfil_grupo","perfil_funcionalidade","perfil_id","perfil_id");
        $table->setJoin("LEFT", "pessoa_grupo","perfil_grupo","grupo_id","grupo_id");
        $table->setWhere(["pessoa_grupo.pessoa_id" =>$id,"m1.menu_id" => "m1.menu_pai"]);
        $table->setOrder("m1.menu_id");
        $tr->setTable($table);
        $tabela = $tr->findAll();
        $menu = "<ul id='menu'><li classe = 'header'>Menu</li>";
        $menu .= self::montaMenu($tabela,$id);
        $menu .= "<li><a href='exit.php'>Sair</a></li></ul>";
        return $menu;
    }
        
    private static function montaMenu($tabela,$id){
        $menu = "";
        foreach($tabela as $linha){
            $menu .= "<li><a href='";
            if(!is_null($linha->func_caminho)){
                $menu .= "\sigpad\src".
                        $linha->func_caminho;
            }else{
                $menu .= "blank.php";
            }
            $menu .= "' target='principal'>".$linha->menu_descricao."</a>";
            $menu .= self::menuFilha($linha->menu_id,$id);
            $menu .= "</li>";
        }
        return $menu;
    }
    
    private static function menuFilha($idMenu,$userId){
        $menu = "";
        $sql = "SELECT a.menu_pai, a.menu_id, a.menu_descricao, b.func_caminho "
                . " FROM menu a "
                . "LEFT JOIN funcionalidade b ON(a.func_id = b.func_id) "
                . "WHERE a.menu_pai LIKE '$idMenu' AND a.menu_pai NOT LIKE a.menu_id "
                . "ORDER BY a.menu_pai, a.menu_id;";
        $tabela = \CasteloBranco\Cemet\Data\DataSet::table($sql);
            if(count($tabela)>0){
                $menu .= "<ul>";
                foreach ($tabela as $linha){
                    $menu .= "<li><a href='..\\..\\".
                            $linha->func_caminho."' target='principal'>".
                            $linha->menu_descricao."</a>";
                    $menu .= self::menuFilha($linha->menu_id, $userId);
                    $menu .= "</li>";
                }
                $menu .= "</ul>";
            }
        return $menu;
    }
}
