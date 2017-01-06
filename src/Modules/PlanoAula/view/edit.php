<?php
$ger = new \CasteloBranco\Cemet\Modules\PlanoAula\Controller\PlanoAulaController();
$dados = $ger->editAction();
$instrutor = $dados["instrutor"];
$plano = $dados["planoaula"];
?>
<h2>Plano de Aula</h2>
<form method="post" action="">
        <input type="hidden" name="idplano" value="<?php echo $plano->getIdPlano();?>">
        <input type="hidden" name="idinstrutor" value="<?php echo $instrutor->getIdInstrutor();?>">
    <div>
        <label for="data">Data</label>
        <input type="date" name="data" value="<?php echo $plano->getData(); ?>">
    </div>
    <div>
        <label for="qtdaula">Quantidade de Aulas</label>
        <input type="text" name="qtdaula" value="<?php echo $plano->getQtdAula() ?>">
    </div>
    <div>
        <label for="idaula">Objetivo</label>
        <select name="idaula" multiple="true">
            <?php foreach($dados["aulas"] as $opt): ?>
            <option value="<?php echo $opt->idaula;?>"
                    <?php if($opt->idaula == $plano->getIdAula()):?>
                    selected="true"
                    <?php endif; ?>
                    ><?php echo $opt->objetivo; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="turno">Turno</label>
        <input type="radio" name="turno" value="1" <?php if($plano->getTurno() == 1):?> checked="true"<?php endif;?>>Manhã
        <input type="radio" name="turno" value="2" <?php if($plano->getTurno() == 2):?> checked="true"<?php endif;?>>Tarde
        <input type="radio" name="turno" value="3" <?php if($plano->getTurno() == 3):?> checked="true"<?php endif;?>>Noite
    </div>
    <div>
        <label for="metodologia">Metodologia</label>
        <textarea name="metodologia"><?php echo $plano->getMetodologia() ?></textarea>
    </div>
        <div>
        <label for="meios">Meios</label>
        <textarea name="meios"><?php echo $plano->getMeios() ?></textarea>
    </div>
    <div>
        <label for="avaliacao">Avaliação</label>
        <textarea name="avaliacao"><?php echo $plano->getAvaliacao(); ?></textarea>
    </div>
    <div>
        <input type="submit" name="btn_add" value="Atualiza">
    </div>
</form>
