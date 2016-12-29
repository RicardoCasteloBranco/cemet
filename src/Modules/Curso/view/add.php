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
        <label for="idorgao">Orgão</label>
        <select name="idorgao">
            <option></option>
            <?php foreach($dados["orgaos"] as $op): ?>
            <option value="<?php echo $op->idorgao;?>"><?php echo $op->sigla; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>