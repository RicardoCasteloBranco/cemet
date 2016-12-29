<?php
$ger = new CasteloBranco\Cemet\Modules\Cargo\Controller\CargoController();
$dados = $ger->addAction();
?>
<h2>Cargos</h2>
<form method="post" action="">
    <div>
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo">
    </div>
    <div>
        <label for="abreviatura">Abreviatura</label>
        <input type="text" name="abreviatura">
    </div>
    <div>
        <label for="idorgao">Orgão</label>
        <select name="idorgao">
            <option></option>
            <?php foreach($dados["orgaos"] as $op): ?>
            <option value="<?php echo $op->idorgao;?>"><?php echo $op->orgao; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="Adiciona" name="btn_confirma">
    </div>
</form>