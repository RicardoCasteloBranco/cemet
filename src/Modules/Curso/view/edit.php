<?php
$ger = new CasteloBranco\Cemet\Modules\Curso\Controller\CursoController();
$dados = $ger->editAction();
$curso = $dados["curso"];
?>
<h2>Cursos</h2>
<form method="post" action="">
    <input type="hidden" name="idcurso" value="<?php echo $curso->getIdCurso(); ?>">
    <div>
        <label for="nomecurso">Curso</label>
        <input type="text" name="nomecurso" value="<?php echo $curso->getNomeCurso(); ?>">
    </div>
    <div>
        <label for="siglacurso">Sigla</label>
        <input type="text" name="siglacurso" value="<?php echo $curso->getSiglaCurso(); ?>">
    </div>
    <div>
        <label for="idorgao">Orgão</label>
        <select name="idorgao">
            <option></option>
            <?php foreach($dados["orgaos"] as $op): ?>
            <option value="<?php echo $op->idorgao;?>"
                    <?php if($op->idorgao == $curso->getIdOrgao()): ?>
                    selected="true"
                        <?php endif;?>><?php echo $op->sigla; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
    </div>
</form>