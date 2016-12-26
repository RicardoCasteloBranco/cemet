<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
            use Corregedoria\Modules\Application\Controller\ApplicationController;
            include_once '../../modules_autoload.php';
            $cont = new ApplicationController();
            $dados = $cont->recuperaAction();
        ?>
        <link href="../../../css/principal.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
        <h1>Altera a Senha</h1>
        </header>
        <form name="altera_senha" method="post" action="" class="formulario">
            <label>CPF: </label><input type="text" name="pessoa_cpf"><br>
            <label>Senha: </label><input type="password" name="usuario_senha"><br>
            <input type="submit" value="Confirma">
        </form>
    </body>
</html>
