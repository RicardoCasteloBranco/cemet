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
        <label for="idcampus">Campus</label>
        <select name="idcampus">
            <option></option>
            <?php foreach($dados["campus"] as $op): ?>
            <option value="<?php echo $op->idcampus;?>"
                    <?php if($op->idcampus == $curso->getIdCampus()): ?>
                    selected="true"
                        <?php endif;?>><?php echo $op->sigla_campus; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="publicoalvo">Público Alvo</label>
        <input type="text" name="publicoalvo" value="<?php echo $curso->getPublicoAlvo(); ?>">
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Atualiza">
    </div>
</form>