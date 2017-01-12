<?php
$ger = new CasteloBranco\Cemet\Modules\Turma\Controller\TurmaController();
$dados = $ger->editAction();
$turma = $dados["turma"];
?>
<h2>Turma</h2>
<form method="post" action="">
    <input type="hidden" name="companhia" value="<?php echo $turma->getCompanhia(); ?>">
    <input type="hidden" name="idturma" value="<?php echo $turma->getIdTurma(); ?>">
    <div>
        <label for="turma">Turma</label>
        <input type="text" name="turma" value="<?php echo $turma->getTurma(); ?>">
    </div>
    <div>
        <label for="sala">Sala</label>
        <input type="text" name="sala" value="<?php echo $turma->getSala(); ?>">
    </div>
    <div>
        <input type="submit" name="bnt_confirma" value="Atualiza" class="botao">
    </div>
</form>
