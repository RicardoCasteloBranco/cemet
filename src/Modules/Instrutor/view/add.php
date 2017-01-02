<?php
$ger = new \CasteloBranco\Cemet\Modules\Instrutor\Controller\InstrutorController();
$dados = $ger->addAction();
$pessoa = $dados["pessoa"];
$turma = $dados["turma"];
$disciplina = $dados["disciplina"];
$companhia = $dados["companhia"];
$curso = $dados["curso"];
?>
<h2>Instrutor - <?php echo $disciplina->getDisciplina().": ".$turma->getTurma()."/".$companhia->getCompanhia()."/".$curso->getSiglaCurso()."/".date("Y",strtotime($companhia->getDataInicio()));?></h2>
<form method="post" action="">
    <input type="hidden" name="idturma" value="<?php echo $turma->getIdTurma(); ?>">
    <input type="hidden" name="iddisciplina" value="<?php echo $disciplina->getIdDisciplina(); ?>">
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo filter_input(INPUT_POST, "cpf") ?>" id="campo" onkeypress="formatar_mascara(this,'###.###.###-##')">
    </div>
    <?php if(isset($dados["pessoa"])):?>
    <div>
        <input type="hidden" name="idpessoa" value="<?php echo $pessoa->getIdPessoa();?>">
        <input type="text" value="<?php echo $pessoa->getNome();?>" disabled="true">
    </div>
    <div>
        <label for="matricula">Matricula</label>
        <input type="text" name="matricula">
    </div>
    <div>
        <label for="tipo_instrutor">Tipo de Instrutor</label>
        <select name="tipo_instrutor">
            <option>Titular</option>
            <option>Secundário</option>
        </select>
    </div>
    <div>
        <input type="submit" name="btn_action" value="Insere">
    </div>
    <?php else:?>
    <div>
        <input type="submit" name="btn_action" value="Busca">
    </div>
    <?php endif; ?>
</form>