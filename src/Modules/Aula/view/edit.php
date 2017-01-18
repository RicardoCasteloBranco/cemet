<?php
$ger = new \CasteloBranco\Cemet\Modules\Aula\Controller\AulaController();
$dados = $ger->editAction();
$disc = $dados["disciplina"];
$aula = $dados["aula"];
?>
<h2>Aulas - <?php echo $disc->getDisciplina();?></h2>
<form method="post" action="">
    <input type="hidden" name="iddisciplina" value="<?php echo $disc->getIdDisciplina(); ?>">
    <input type="hidden" name="idaula" value="<?php echo $aula->getIdAula(); ?>">
    <div>
        <label for="objetivo">Objetivo</label>
        <textarea name="objetivo"><?php echo $aula->getObjetivo(); ?></textarea>
    </div>
    <div>
        <label for="qtd_aulas">Quantidade de Aulas</label>
        <input type="text" name="qtd_aulas" value="<?php echo $aula->getQtdAulas(); ?>">
    </div>
    <div>
        <label for="instrutor_secundario">Instrutor Secundário</label>
        <input type="radio" name="instrutor_secundario" value="1" <?php if($aula->getInstrutorSecundario() == 1):?> checked="true"<?php endif; ?>>Sim
        <input type="radio" name="instrutor_secundario" value="0" <?php if($aula->getInstrutorSecundario() == 0):?> checked="true"<?php endif; ?>>Não
    </div>
    <div>
        <label for="conteudo">Conteúdo</label>
        <textarea name="conteudo"><?php echo $aula->getConteudo(); ?></textarea>
    </div>
    <div>
        <label for="eixo">Eixo</label>
        <textarea name="eixo"><?php echo $aula->getEixo(); ?></textarea>
    </div>
    <div>
        <label for="relacao">Relação Transdisciplinar</label>
        <textarea name="relacao"><?php echo $aula->getRelacao(); ?></textarea>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
        <input type="button" onclick="location.href='?module=Aula&page=index.php&iddisciplina=<?php echo $aula->getIdDisciplina(); ?>'" value="Voltar">
    </div>
</form>