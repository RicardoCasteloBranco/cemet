<?php
$ger = new CasteloBranco\Cemet\Modules\Coordenador\Controller\CoordenadorController();
$dados = $ger->editAction();
$coordenador = $dados["coordenador"];
$pessoa = $dados["pessoa"];
$turma = $dados["turma"];
$companhia = $dados["companhia"];
$curso = $dados["curso"];
?>
<h2>Coordenador - <?php echo $turma->getTurma()."/".$companhia->getCompanhia()."/".$curso->getSiglaCurso()."/".date("Y",strtotime($companhia->getDataInicio()));?></h2>
<form method="post" action="">
    <input type ="hidden" name="idcoordenador" value="<?php echo $coordenador->getIdCoordenador();?>">
    <input type="hidden" name="idturma" value="<?php echo $turma->getIdTurma(); ?>">
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo filter_input(INPUT_POST, "cpf") ?>" id="campo" onkeypress="formatar_mascara(this,'###.###.###-##')">
    </div>
    <div>
        <input type="hidden" name="idpessoa" value="<?php echo $pessoa->getIdPessoa();?>">
        <input type="text" value="<?php echo $pessoa->getNome();?>" disabled="true">
    </div>
    <div>
        <input type="submit" name="btn_action" value="Busca">
    </div>
    <div>
        <input type="submit" name="btn_action" value="Altera">
    </div>
</form>