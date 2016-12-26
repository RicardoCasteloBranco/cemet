<!DOCTYPE html>
<!--
Principal to Application
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIGPAD</title>
        <?php
            use Corregedoria\Modules\Application\Controller\ApplicationController;
            include_once '../../modules_autoload.php';
            $cont = new ApplicationController();
            $dados = $cont->principalAction();
            $usuario = $dados['usuario'];
            $menu = $dados['menu'];
        ?>
        <link href="../../../css/principal.css" rel="StyleSheet" type="text/css">
        <link href="../../../css/menu.css" rel="StyleSheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1>SECRETARIA DE DEFESA SOCIAL<br>CORREGEDORIA GERAL</h1>
                <h2>Sistema Integrado de Procedimentos Administrativos Disciplinares</h2>
            </div>
            
            <blockquote>Seja bem vindo: <?php echo $usuario->getNome(); ?></blockquote>
        </header>
        <iframe name="principal" src="../../Procedimento/view/index.php"></iframe>
         <div class="menu">
            <?php echo $menu; ?>
        </div>
    </body>
</html>
