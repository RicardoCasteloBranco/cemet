<?php
$ger = new \CasteloBranco\Cemet\Modules\Orgao\Controller\OrgaoController();
$dados = $ger->editAction();
$orgao = $dados['orgao'];
?>
<form method="post" action="">
    <h2>Orgão</h2>
    <input type="hidden" name="idorgao" value="<?php echo $orgao->getIdOrgao();?>">
    <div>
        <label for="orgao">Orgão</label>
        <input type="text" name="orgao" value="<?php echo $orgao->getOrgao();?>">
    </div>
    <div>
        <label for="sigla">Sigla</label>
        <input type="text" name="sigla" value="<?php echo $orgao->getSigla();?>">
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
    </div>
</form>