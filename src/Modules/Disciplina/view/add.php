<?php
$ger = new CasteloBranco\Cemet\Modules\Disciplina\Controller\DisciplinaController();
$dados = $ger->addAction();
$optGroup = 0;
?>
<h2>Disciplina</h2>
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
        <label for="disciplina">Disciplina</label>
        <input type="text" name="disciplina">
    </div>
    <div>
        <label for="sigla">Sigla</label>
        <input type="text" name="sigla">
    </div>
    <div>
        <label for="cargahoraria">Carga Horária</label>
        <input type="text" name="cargahoraria">
    </div>
    <div>
        <label for="ementa">Ementa</label>
        <textarea name="ementa"></textarea>
    </div>
    <div>
        <label for="conhecimento">Conhecimento</label>
        <textarea name="conhecimento"></textarea>
    </div>
    <div>
        <label for="habilidade">Habilidade</label>
        <textarea name="habilidade"></textarea>
    </div>
    <div>
        <label for="atitude">Atitude</label>
        <textarea name="atitude"></textarea>
    </div>
    <div>
        <label for="bibliografia">Bibliografia</label>
        <textarea name="bibliografia"></textarea>
    </div>
    <div>
        <input type="submit" name="btn_confirma" value="Adiciona">
    </div>
</form>
