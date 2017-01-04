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
        <link href="../../../public/css/principal.css" rel="stylesheet" type="text/css">
        <link href="../../../public/css/paging.css" rel="stylesheet" type="text/css">
        <script src="../../../public/jscript/sorttable.js" type="text/javascript"></script>
        <script src="../../../public/jscript/paging.js" type="text/javascript"></script>
        <script src="../../../public/jscript/mascara.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        ini_set("display_errors", 1);
        error_reporting(E_ALL);
         include filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/vendor/autoload.php";
         include filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/src/Modules/". filter_input(INPUT_GET, "module")."/view/". filter_input(INPUT_GET, "page");
        ?>
    </body>
</html>
