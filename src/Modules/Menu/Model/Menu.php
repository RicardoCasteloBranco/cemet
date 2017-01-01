<?php
namespace CasteloBranco\Cemet\Modules\Menu\Model;
use CasteloBranco\Cemet\Factory\Product;
/**
 * Description of Menu
 *
 * @author ricardo
 */
class Menu extends Product{
    private $idMenu;
    private $titulo;
    private $menuPai;
    private $descricao;
    private $caminho;
    private $menuFilho = array();
    
    public function __construct(array $dados) {
        $this->setIdMenu(isset($dados["idmenu"])?$dados["idmenu"]:0)
             ->setCaminho($dados["caminho"])
             ->setDescricao($dados["descricao"])
             ->setMenuPai($dados["menu_pai"])
             ->setTitulo($dados["titulo"]);
    }
    
    public function getIdMenu() {
        return $this->idMenu;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getMenuPai() {
        return $this->menuPai;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCaminho() {
        return $this->caminho;
    }
    
    public function getMenuFilho() {
        return $this->menuFilho;
    }

    public function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
        return $this;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function setMenuPai($menuPai) {
        $this->menuPai = $menuPai;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setCaminho($caminho) {
        $this->caminho = $caminho;
        return $this;
    }
    
    public function setMenuFilho(Menu $menuFilho) {
        array_push($this->menuFilho, $menuFilho);
        return $this;
    }

    public function getParams() {
        return array(
            "idmenu" => \PDO::PARAM_INT,
            "titulo" => \PDO::PARAM_STR,
            "menu_pai" => \PDO::PARAM_STR,
            "descricao" => \PDO::PARAM_STR,
            "caminho" => \PDO::PARAM_STR
        );
    }

    public function getValues() {
        return array(
            "idmenu" => $this->getIdMenu(),
            "titulo" => $this->getTitulo(),
            "menu_pai" => $this->getMenuPai(),
            "descricao" => $this->getDescricao(),
            "caminho" => $this->getCaminho()
        );
    }
    
    public function __toString() {
        $menu = "<li><a href='".$this->caminho."'";
        if(!is_null($this->caminho)){
            $menu .= " target='principal'>";
        }else{
            $menu .= ">";
        }
        $menu .= $this->titulo."</a>";
        if(count($this->menuFilho)>0){
            $menu .= "<ul>";
            foreach ($this->menuFilho as $filha){
            $menu .= $filha->__toString();
            }
            $menu .= "</ul>";
        }
        $menu .= "</li>";
        return $menu;
    }
}
