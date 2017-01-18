<!DOCTYPE html>
<!--
Principal to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Gerenciamento de Cursos</title>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
        <link href="../../../public/css/menu.css" rel="stylesheet" type="text/css">
        <?php
        include filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/vendor/autoload.php";
        $ger = new \CasteloBranco\Cemet\Modules\Application\Controller\ApplicationController();
        $dados = $ger->indexAction();
        $menu = $dados["menu"];
        $pessoa = $dados["pessoa"];
        ?>
    </head>
    <body>
        <header>
            <div class="container">
                <h1 id="titulo_cabecalho">SECRETARIA DE DEFESA SOCIAL<br>ACIDES</h1>
                <h2 id="titulo_cabecalho">Sistema de Gerenciamento de Cursos</h2>
            </div>
        </header>            
            <div id="bem_vindo"><b>Seja bem vindo: </b><?php echo $pessoa->getNome(); ?></div>
        <iframe name="principal" src="bootstrap.php?module=<?php echo filter_input(INPUT_GET, "module"); ?>&page=<?php echo filter_input(INPUT_GET,"page"); ?>"></iframe>
         <div class="menu">
             <ul id="menu">
                 <li class="header">Menu</li>
                <?php foreach ($menu as $row){
                 echo $row;
                }
                ?>
                 <li><a href="exit.php">Sair</a></li>
             </ul>
        </div>
    </body>
</html>
