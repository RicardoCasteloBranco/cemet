<!DOCTYPE html>
<!--
Principal to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
        <link href="../../../public/css/paging.css" rel="stylesheet" type="text/css">
        <script src="../../../public/jscript/sorttable.js" type="text/javascript"></script>
        <script src="../../../public/jscript/paging.js" type="text/javascript"></script>
        <script src="../../../public/jscript/extensao.js" type="text/javascript"></script>
        <script src="../../../public/jscript/mascara.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>SECRETARIA DE DEFESA SOCIAL<br>CORREGEDORIA GERAL</h1>
                <h2>Sistema Integrado de Procedimentos Administrativos Disciplinares</h2>
            </div>
            
            <blockquote>Seja bem vindo: <?php ?></blockquote>
        </header>
        <iframe name="principal" src="<?php echo filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/src/Modules/Application/view/bootstrap.php?page=".  filter_input(INPUT_GET, "page"); ?>"></iframe>
         <div class="menu">
             <ul>Menu</ul>
        </div>
    </body>
</html>
