<?php
$ger = new CasteloBranco\Cemet\Modules\Turma\Controller\TurmaController();
$dados = $ger->addAction();
?>
<h2></h2>
<form method="post" action="">
    <input type="hidden" name="companhia" value="<?php echo filter_input(INPUT_GET, "idcompanhia") ?>">
    <div>
        <label for="turma">Turma</label>
        <input type="text" name="turma">
    </div>
    <div>
        <label for="sala">Sala</label>
        <input type="text" name="sala">
    </div>
    <div>
        <input type="submit" name="bnt_confirma" value="Adiciona" class="botao">
    </div>
</form>