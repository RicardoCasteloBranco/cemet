<option></option>
<?php
include_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT")."/cemet/vendor/autoload.php";
$ger = new CasteloBranco\Cemet\Modules\Cidade\Controller\CidadeController();
$dados = $ger->indexAction();
foreach ($dados["cidades"] as $opt){
    echo "<option value='".$opt->idcidade."'>".$opt->nome."</option>";
}
