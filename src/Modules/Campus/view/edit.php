<?php
$ger = new \CasteloBranco\Cemet\Modules\Campus\Controller\CampusController();
$dados = $ger->editAction();
$campus = $dados["campus"];
?>
<h2>Cadastro de Campus</h2>
<form method="post" action="">
    <input type="hidden" name="idcampus" value="<?php echo $campus->getIdCampus();   ?>">
    <fieldset>
        <div>
            <label for="idorgao">Orgão</label>
            <select name="idorgao">
                <option></option>
                <?php foreach ($dados["orgaos"] as $opt): ?>
                <option value="<?php echo $opt->idorgao; ?>"
                        <?php if($opt->idorgao == $campus->getIdOrgao()): ?>
                        selected="true"
                        <?php endif; ?>
                        ><?php echo $opt->orgao ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div>
            <label for="nome_campus">Nome do Campus</label>
            <input type="text" name="nome_campus" value="<?php echo  $campus->getNomeCampus(); ?>">
        </div>
        <div>
            <label for="sigla_campus">Sigla do Campus</label>
            <input type="text" name="sigla_campus" value="<?php echo $campus->getSiglaCampus(); ?>">
        </div>
        <div>
            <input type="submit" name="btn_confirma" value="Atualiza">
        </div>
    </fieldset>
</form>
