<?php
$ger = new CasteloBranco\Cemet\Modules\Fotografia\Controller\FotografiaController();
$dados = $ger->addAction();
?>
<h2>Foto para Ficha Individual</h2>
<div>Deverá ser enviada uma fotografia de frente em fundo branco sem óculos.</div>
<form method="post" action="" enctype="multipart/form-data">
    <fieldset>
        <input type="hidden" name="idaluno" value="<?php echo filter_input(INPUT_GET, "idaluno");?>">
        <div>
            <label for="fotografia">Fotografia</label>
            <input type="file" name="fotografia">
        </div>
    </fieldset>
    <fieldset>
        <div>
            <input type="submit" name="btn_confirma" value="Adiciona">
        </div>
    </fieldset>
</form>
