<?php
$ger = new CasteloBranco\Cemet\Modules\Cargo\Controller\CargoController();
$dados = $ger->editAction();
$cargo = $dados["cargo"];
$orgaos = $dados["orgaos"];
?>
<h2>Cargos</h2>
<form method="post" action="">
    <input type="hidden" name="idcargo" value="<?php echo $cargo->getIdCargo(); ?>">
    <div>
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo" value="<?php echo $cargo->getCargo(); ?>">
    </div>
    <div>
        <label for="abreviatura">Abreviatura</label>
        <input type="text" name="abreviatura" value="<?php echo $cargo->getAbreviatura(); ?>">
    </div>
    <div>
        <label for="idorgao">Orgão</label>
        <select name="idorgao">
            <option></option>
            <?php foreach($dados["orgaos"] as $op): ?>
            <option value="<?php echo $op->idorgao;?>"
                    <?php if($op->idorgao == $cargo->getIdOrgao()): ?>
                    selected="true"
                    <?php endif; ?>
                    ><?php echo $op->orgao; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Atualiza" name="btn_confirma">
    </div>
</form>
