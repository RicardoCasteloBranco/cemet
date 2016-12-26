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
        <script>
            alert("Sigpad salvo com sucesso nº <?php echo filter_input(INPUT_GET, "msg"); ?>");
            location.href="../../Procedimento/view/index.php";
        </script>
    </head>
    <body>
        <h1>Procedimento salvo com sucesso!</h1>
        <blockquote>Procedimento número: <?php echo filter_input(INPUT_GET, "msg"); ?></blockquote>
    </body>
</html>
