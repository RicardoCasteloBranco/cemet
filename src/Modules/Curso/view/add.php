<?php
$ger = new CasteloBranco\Cemet\Modules\Curso\Controller\CursoController();
$dados = $ger->addAction();
?>
<h2>Cursos</h2>
<form method="post" action="">
    <div>
        <label for="nomecurso">Curso</label>
        <input type="text" name="nomecurso">
    </div>
    <div>
        <label for="siglacurso">Sigla</label>
        <input type="text" name="siglacurso">
    </div>
    <div>
        <label for="idcampus">Campus</label>
        <select name="idcampus">
            <option></option>
            <?php foreach($dados["campus"] as $op): ?>
            <option value="<?php echo $op->idcampus;?>"><?php echo $op->sigla_campus; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="publicoalvo">Público Alvo</label>
        <input type="text" name="publicoalvo">
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>