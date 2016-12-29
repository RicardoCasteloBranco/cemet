<!DOCTYPE html>
<!--
Principal to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1 id="titulo_cabecalho">SECRETARIA DE DEFESA SOCIAL<br>ACIDES - CEMET/I</h1>
                <h2 id="titulo_cabecalho">Sistema de Gerenciamento de Cursos</h2>
            </div>
            
            <blockquote>Seja bem vindo: <?php ?></blockquote>
        </header>
        <iframe name="principal" src="bootstrap.php?module=<?php echo filter_input(INPUT_GET, "module"); ?>&page=<?php echo filter_input(INPUT_GET,"page"); ?>"></iframe>
         <div class="menu">
             <ul>Menu</ul>
        </div>
    </body>
</html>
