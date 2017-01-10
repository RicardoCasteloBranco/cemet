<!DOCTYPE html>
<!--
Principal to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Gerenciamento de Cursos</title>
        <link href="css/principal.css" rel="stylesheet" type="text/css">
        <link href="css/menu.css" rel="stylesheet" type="text/css">
        <script src="jscript/mascara.js" type="text/javascript"></script>
        <?php
        ini_set("display_errors",1);
        error_reporting(E_ALL);
        include filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/vendor/autoload.php";
        $ger = new \CasteloBranco\Cemet\Modules\Application\Controller\ApplicationController();
        $dados = $ger->loginAction();
        ?>
    </head>
    <body>
        <header>
            <div class="container">
                <h1 id="titulo_cabecalho">SECRETARIA DE DEFESA SOCIAL<br>ACIDES - CEMET/I</h1>
                <h2 id="titulo_cabecalho">Sistema de Gerenciamento de Cursos</h2>
            </div>
            <div id="login">
                <h2>Login</h2>
                <form method="post" action="" name="fm_login">
                    <div>
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" onkeypress="formatar_mascara(this,'###.###.###-##')" id="campo">
                    </div>
                    <div>
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha">
                    </div>
                    <div>
                        <input type="submit" name="btn_confirma" value="Confirma">
                    </div>
                </form>
            </div>
        </header>
    </body>
</html>
