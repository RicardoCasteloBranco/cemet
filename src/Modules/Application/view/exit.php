<!DOCTYPE html>
<!--
Exit to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
            use CasteloBranco\Cemet\Modules\Application\Controller\ApplicationController;
            include filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/vendor/autoload.php";
            $cont = new ApplicationController();
            $dados = $cont->exitAction();
        ?>
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form name="exit" method="post" action="">
            <h2>Você deseja realmente sair do Sistema?</h2><br>
            <input type="submit" value="Sim">
            <input type="button" value="Não" onclick="history.go(-1)">
        </form> 
    </body>
</html>
