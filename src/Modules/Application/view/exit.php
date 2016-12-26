<!DOCTYPE html>
<!--
Exit to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
            use Corregedoria\Modules\Application\Controller\ApplicationController;
            include_once '../../modules_autoload.php';
            $cont = new ApplicationController();
            $dados = $cont->exitAction();
        ?>
        <link href="../../../css/principal.css" rel="StyleSheet" type="text/css">
    </head>
    <body>
        <form name="exit" method="post" action="" class="login">
            <h2>Você deseja realmente sair do Sistema?</h2><br>
            <input type="submit" value="Sim">
            <input type="button" value="Não" onclick="history.go(-1)">
        </form> 
    </body>
</html>
