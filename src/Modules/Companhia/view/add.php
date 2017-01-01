<?php
$ger = new CasteloBranco\Cemet\Modules\Companhia\Controller\CompanhiaController();
$dados = $ger->addAction();
?>
<h2>Companhia</h2>
<form method="post" action="">
    <div>
        <label for="idcurso">Curso</label>
        <select name="idcurso">
        <option></option>
        <?php foreach ($dados["cursos"] as $opt):?>
        <?php if($opt->idorgao != $optGroup):?>
        <optgroup label="<?php $optGroup = $opt->idorgao; echo $opt->sigla;?>">
        <?php endif; ?>
        <option value="<?php echo $opt->idcurso;?>"><?php echo $opt->nomecurso;?></option>
        <?php if($opt->idorgao != $optGroup): ?>
        </optgroup>
        <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="companhia">Companhia</label>
        <input type="text" name="companhia">
    </div>
    <div>
        <label for="local">Local</label>
        <input type="text" name="local">
    </div>
    <div>
        <label for="data_inicio">Data de Inicio</label>
        <input type="date" name="data_inicio">
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>