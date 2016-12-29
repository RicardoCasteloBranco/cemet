<?php
$ger = new \CasteloBranco\Cemet\Modules\Aula\Controller\AulaController();
$dados = $ger->addAction();
$disc = $dados["disciplina"];
?>
<h2>Aulas - <?php echo $disc->getDisciplina();?></h2>
<form method="post" action="">
    <input type="hidden" name="iddisciplina" value="<?php echo $disc->getIdDisciplina(); ?>">
    <div>
        <label for="objetivo">Objetivo</label>
        <textarea name="objetivo"></textarea>
    </div>
    <div>
        <label for="qtd_aulas">Quantidade de Aulas</label>
        <input type="text" name="qtd_aulas">
    </div>
    <div>
        <label for="instrutor_secundario">Instrutor Secundário</label>
        <input type="radio" name="instrutor_secundario" value="1">Sim
        <input type="radio" name="instrutor_secundario" value="0">Não
    </div>
    <div>
        <label for="conteudo">Conteúdo</label>
        <textarea name="conteudo"></textarea>
    </div>
    <div>
        <label for="eixo">Eixo</label>
        <textarea name="eixo"></textarea>
    </div>
    <div>
        <label for="relacao">Relação</label>
        <textarea name="relacao"></textarea>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>