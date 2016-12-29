<?php
$ger = new \CasteloBranco\Cemet\Modules\Orgao\Controller\OrgaoController();
$dados = $ger->addAction();
?>
<form method="post" action="">
    <h2>Orgão</h2>
    <div>
        <label for="orgao">Orgão</label>
        <input type="text" name="orgao">
    </div>
    <div>
        <label for="sigla">Sigla</label>
        <input type="text" name="sigla">
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>