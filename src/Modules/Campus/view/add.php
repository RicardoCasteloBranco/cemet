<?php
$ger = new \CasteloBranco\Cemet\Modules\Campus\Controller\CampusController();
$dados = $ger->addAction();
?>
<h2>Cadastro de Campus</h2>
<form method="post" action="">
    <fieldset>
        <div>
            <label for="idorgao">Orgão</label>
            <select name="idorgao">
                <option></option>
                <?php foreach ($dados["orgaos"] as $opt): ?>
                <option value="<?php echo $opt->idorgao; ?>"><?php echo $opt->orgao ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div>
            <label for="nome_campus">Nome do Campus</label>
            <input type="text" name="nome_campus">
        </div>
        <div>
            <label for="sigla_campus">Sigla do Campus</label>
            <input type="text" name="sigla_campus">
        </div>
        <div>
            <input type="submit" name="btn_confirma" value="Adiciona">
        </div>
    </fieldset>
</form>
